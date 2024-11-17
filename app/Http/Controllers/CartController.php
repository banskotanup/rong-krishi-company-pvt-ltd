<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DiscountCode;
use App\Models\ShippingCharge;
use App\Models\OrderModel;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\ProductWishlist;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Notification;
use App\Models\PaymentSetting;
use Auth;
use Cart;
use Surfsidemedia\Shoppingcart\CartItem;
use Surfsidemedia\Shoppingcart\CartItemOptions;
use Hash;
use Stripe\Stripe;
use Session;
use App\Mail\OrderInvoiceMail;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function getCart(){
        $data['meta_title'] = 'Shopping Cart';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        
        if(!empty(Auth::check()))
        {
            $user_id = Auth::user()->id;   
            Cart::restore($user_id);
        }
        $cartItems = Cart::content();
        return view('cart.cart',compact('cartItems'), $data);
    }

    public function add_to_Cart(Request $request){
        $getProduct = Product::getSingle($request->product_id);
        $remQuantity = Inventory::getSingle($request->product_id);

        if($request->qty > $remQuantity->remaining_quantity){
            Alert::warning('Warning!','The quantity you have requested exceeds our available stock. Please adjust your order to match the current stock levels.');
            return redirect()->back();
        }

        else{
            $total = $getProduct->price * $request->qty;
            
            Cart::add([
                'id' => $getProduct->id,
                'name' => $getProduct->title,
                'price' => $getProduct->price,
                'qty' => $request->qty,
                
            ]);
            if(!empty(Auth::check()))
            {
                $user_id = Auth::user()->id;   
                Cart::store($user_id);
            }
            
            toast('Item added to cart.','success')->autoClose(3000);
            return redirect()->back();
        }
    }

    public function cart_delete($rowId){
        if (!$rowId) {
            toast('Invalid item selected.','error');
            return redirect()->back();
        }

        Cart::remove($rowId);
        DB::table('shoppingcart')
        ->where('identifier', Auth::user()->id)
        ->update([
            'content' => serialize(Cart::content()),
        ]);
        toast('Item removed from cart.','error')->autoClose(3000);
        return redirect()->back();
    }

    public function update_cart(Request $request){
        $cartItems = $request->input('cart'); // Retrieve the cart array from the request

        if (!is_array($cartItems)) {
            toast('Invalid cart data.','error')-autoClose(3000);
            return redirect()->back();
        }

        // Loop through each cart item to update
        foreach ($cartItems as $item) {
            $rowId = $item['rowId'] ?? null;  // Retrieve the rowId
            $newQty = $item['qty'] ?? null;   // Retrieve the new quantity

            // Validate the input
            if ($rowId && is_numeric($newQty) && $newQty > 0) {
                // Update the cart session
                Cart::update($rowId, ['qty' => $newQty]);

                // Update the database
                DB::table('shoppingcart')
                    ->where('identifier', Auth::id())  // Match the current user's cart
                    ->update([
                        'content' => serialize(Cart::content()) // Serialize the updated cart content
                    ]);
            }
        }
        toast('Cart updated successfully.','success')->autoClose(3000);
        return redirect()->back();
    }

    public function checkout(Request $request){
        $data['meta_title'] = 'Checkout';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getShipping'] = ShippingCharge::getRecordActive();
        $data['getPaymentSetting'] = PaymentSetting::getSingle();
        return view('cart.checkout', $data);
    }

    public function apply_discount_code(Request $request){
        $getDiscount = DiscountCode::CheckDiscount($request->discount_code);
        $balance = Cart::subTotal();
        $total = (float)str_replace(',', '', $balance);
        if(!empty($getDiscount)){

            if($getDiscount->type == 'Amount'){
                $discount_amount  = floatval($getDiscount->percent_amount);
                $payable_total = floatval($total) - $discount_amount;
            }
            else{
                $discount_amount  = floatval($total) * floatval($getDiscount->percent_amount) / 100 ;
                $payable_total = floatval($total) - $discount_amount;

            }

            $json['per'] = $getDiscount->percent_amount;
            $json['total'] = $total;
            $json['status'] = true;
            $json['discount_amount'] = number_format($discount_amount, 2);
            $json['payable_total'] = $payable_total;
            $json['message'] = "success";
        }
        else{
            $json['status'] = false;
            $json['discount_amount'] = '0.00';
            $json['payable_total'] = $total;
            $html = 'Invalid discount code. Please check for errors or expiration.';
            $json['html'] = $html;
        }

        echo json_encode($json);
    }

    public function place_order(Request $request)
    {
        $validate = 0;
        $message = '';
        if(!empty(Auth::check()))
        {
         $user_id = Auth::user()->id;   
        }
        else
        {
            if(!empty($request->is_create))
            {
                $checkEmail = User::checkEmail($request->email);
                if(!empty($checkEmail))
                {
                    $message = "Email is already registered. Please use a different email or log in to your account.";
                    $validate = 1;
                }
                else
                {
                    $save = new User;
                    $save->user_number = mt_rand(100000000,999999999);
                    $save->name = trim($request->first_name);
                    $save->email = trim($request->email);
                    $save->password = Hash::make($request->password);
                    $save->save();
                    $user_id = $save->id;

                    $user_id = 1;
                    $url = url('/member_list');
                    $message = "New Customer Registered #".$save->user_number." #Name".$save->name;
                    Notification::insertRecord($user_id, $url, $message);
                }
            }
            else
            {
                $user_id = '';
            }
        }

        if(empty($validate))
        {
            $getShipping = ShippingCharge::getSingle($request->shipping);
            $payableTotal = (float)str_replace(',', '', Cart::subTotal());
            $total_balance = (float)str_replace(',', '', Cart::subTotal());
            $discountAmount = 0;
            $discount_code = '';
            if(!empty($request->discount_code))
            {
                $getDiscount = DiscountCode::CheckDiscount($request->discount_code);
                if(!empty($getDiscount))
                {
                    $discount_code = $request->discount_code;
                    if($getDiscount->type == 'Amount')
                    {
                        $discountAmount  = $getDiscount->percent_amount;
                        $payableTotal = $payableTotal - $getDiscount->percent_amount;
                    }
                    else
                    {
                        $discountAmount  = ($payableTotal * $getDiscount->percent_amount) / 100;
                        $payableTotal = $payableTotal - $discountAmount;
                    }
                }
            }
    
            $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
            $total_amount = $payableTotal + $shipping_amount;
    
            $order = new OrderModel;
            if(!empty($user_id))
            {
                $order->user_id = trim($user_id);  
            }
            $order->order_number = mt_rand(100000000,999999999);
            $order->first_name = trim($request->first_name);
            $order->last_name = trim($request->last_name);
            $order->company_name = trim($request->company_name);
            $order->country = trim($request->country);
            $order->address_one = trim($request->address_one);
            $order->address_two = trim($request->address_two);
            $order->city = trim($request->city);
            $order->state = trim($request->state);
            $order->postcode = trim($request->postcode);
            $order->phone = trim($request->phone);
            $order->email = trim($request->email);
            $order->notes= trim($request->notes);
            $order->discount_amount= trim($discountAmount);
            $order->discount_code= trim($discount_code);
            $order->shipping_id= trim($request->shipping);
            $order->shipping_amount= trim($shipping_amount);
            $order->total_balance= trim($total_balance);    
            $order->total_amount= trim($total_amount);    
            $order->payment_method= trim($request->payment_method);
            $order->save();
    
            foreach (Cart::content() as $key => $data)
            {
                $order_item = new OrderItem;
                $order_item->order_id = $order->id;
                $order_item->product_id = $data->id;
                $order_item->qty = $data->qty;
                $order_item->price = $data->price;
                $order_item->total_price = $data->price * $data->qty;
                $order_item->save();

                $invUpdate = Inventory::getSingle($data->id);
                $invUpdate->sold_quantity = $data->qty + $invUpdate->sold_quantity;
                $invUpdate->sold_price = $data->price;
                $invUpdate->total_selling_amount = $invUpdate->total_selling_amount + ($data->qty * $data->price);
                $invUpdate->remaining_quantity = $invUpdate->purchase_quantity - $invUpdate->sold_quantity;
                $invUpdate->save();
            }
            $json['status'] = true;
            $json['message'] = "success";
            $json['redirect'] = url('/checkout/payment?order_id='.base64_encode($order->id)); 
            $html = '';
            $json['html'] = $html;
        }
        else{
            $json['status'] = false;
            $json['message'] = $message;
        }
        echo json_encode($json);
    }

    public function checkout_payment(Request $request)
    {
        if(!empty(Cart::subTotal()) && !empty($request->order_id))
        {
            $order_id = base64_decode($request->order_id);
            $getOrder = OrderModel::getSingle($order_id);
            if(!empty($getOrder))
            {
                $getPaymentSetting = PaymentSetting::getSingle();
                if($getOrder->payment_method == 'cash')
                {
                    $getOrder->is_payment = 1;
                    $getOrder->save();

                    Mail::to($getOrder->email)->send(new OrderInvoiceMail($getOrder));

                    $user_id = 1;
                    $url = url('/order_view/'.$getOrder->id);
                    $message = "New Order Received #".$getOrder->order_number;
                    Notification::insertRecord($user_id, $url, $message);

                    if(!empty(Auth::user()->id)){
                        DB::table('shoppingcart')->where('identifier', Auth::user()->id)->delete();
                    }
                    Cart::destroy();
                    Alert::success('Success!','Thank you for your order! We are processing it now and will send you an email with the details shortly.');
                    return redirect('cart');
                }
                else if($getOrder->payment_method == 'khalti')
                {
                    $finalPrice = $getOrder->total_amount * 100; // Convert to paisa

                    $data = [
                        'amount' => $finalPrice,
                        'product_identity' => $getOrder->id, // Unique identifier for the product
                        'product_name' => 'Rongkrishi',
                        'product_url' => url('products/rongkrishi'),
                        'payment_success_url' => url('khalti/payment-success'),
                        'payment_failure_url' => url('checkout'),
                        'public_key' => $getPaymentSetting->khalti_public_key,
                    ];

                    $getOrder->save();

                    return view('cart.khalti_charge', $data);

                }
                else if($getOrder->payment_method == 'stripe')
                {
                    Stripe::setApikey($getPaymentSetting->stripe_secret_key);
                    $finalprice = $getOrder->total_amount * 100;

                    $session = \Stripe\Checkout\Session::create([
                        'customer_email' => $getOrder->email,
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' => [
                                'currency' => 'NPR',
                                'product_data' => [
                                    'name' => 'Rongkrishi',
                                ],
                                'unit_amount' => intval($finalprice),
                            ],
                            'quantity' => 1,
                        ]],
                        'mode' => 'payment',
                        'success_url' => url('stripe/payment-success'),
                        'cancel_url' => url('checkout'),
                        ]);

                        $getOrder->stripe_session_id = $session['id'];
                        $getOrder->save();

                        $data['session_id'] = $session['id'];
                        Session::put('stripe_session_id', $session['id']);
                        $data['setPublicKey'] = $getPaymentSetting->stripe_public_key;

                        return view('cart.stripe_charge', $data);
                }
            }
            else
            {
                abort(404);
            }
        }
        else
        {
            abort(404);
        }
    }

    public function stripe_success_payment(Request $request)
    {
        $getPaymentSetting = PaymentSetting::getSingle();
        $trans_id = Session::get('stripe_session_id');
        \Stripe\Stripe::setApiKey($getPaymentSetting->stripe_secret_key);
        $getdata = \Stripe\Checkout\Session::retrieve($trans_id);

        $getOrder = OrderModel::where('stripe_session_id', '=', $getdata->id)->first();

        if(!empty($getOrder) && !empty($getdata->id) && $getdata->id == $getOrder->stripe_session_id)
        {
            $getOrder->is_payment = 1;
            $getOrder->transaction_id = $getdata->id;
            $getOrder->payment_data = json_encode($getdata);
            $getOrder->save();

            Mail::to($getOrder->email)->send(new OrderInvoiceMail($getOrder));
            $user_id = 1;
            $url = url('/order_view/'.$getOrder->id);
            $message = "New Order Received #".$getOrder->order_number;
            Notification::insertRecord($user_id, $url, $message);
            if(!empty(Auth::user()->id)){
                DB::table('shoppingcart')->where('identifier', Auth::user()->id)->delete();
            }
            Cart::destroy();
            Alert::success('Success!','Thank you for your order! We are processing it now and will send you an email with the details shortly.');
            return redirect('cart');

        }
        else
        {
            Alert::error('ERROR!','An unexpected issue occurred. Please try again later.');
            return redirect('cart');
        }
    }
    public function add_to_wishlist(Request $request)
    {
        $check = ProductWishlist::checkAlready($request->product_id, Auth::user()->id);
            if(empty($check))
            {
                $save = new ProductWishlist;
                $save->product_id = $request->product_id;
                $save->user_id = Auth::user()->id;
                $save->save();

                $json['is_Wishlist'] = 1;
                toast('Item added to wishlist.','success')->autoClose(3000);
            }
            else
            {
                ProductWishlist::DeleteRecord($request->product_id, Auth::user()->id);
                $json['is_Wishlist'] = 0;
                toast('Item removed from wishlist.','error')->autoClose(3000);
            }
        $json['status'] = true;
        echo json_encode($json);
    }
}
