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
use Auth;
use Cart;
use Hash;
use Stripe\Stripe;
use Session;
use App\Mail\OrderInvoiceMail;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function getCart(){
        $data['meta_title'] = 'Shopping Cart';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $cartItems = Cart::content();
        return view('cart.cart',compact('cartItems'), $data);
    }

    public function add_to_Cart(Request $request){
        $getProduct = Product::getSingle($request->product_id);


        $total = $getProduct->price * $request->qty;
        
        Cart::add([
            'id' => $getProduct->id,
            'name' => $getProduct->title,
            'price' => $getProduct->price,
            'qty' => $request->qty,
            
        ]);
        toast('Item added to cart successfully.','success')->autoClose(3000);
        return redirect()->back();
    }

    public function cart_delete($rowId){

        Cart::remove($rowId);
        
        return redirect()->back();
    }

    public function update_cart(Request $request){

        foreach($request->cart as $cart){
            Cart::update($cart['rowId'], array(
                'qty' => $cart['qty'],
            ));
        }
        return redirect()->back();
    }

    public function checkout(Request $request){
        $data['meta_title'] = 'Checkout';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getShipping'] = ShippingCharge::getRecordActive();
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
                $order_item->total_price = $data->price;
                $order_item->save();
            }
            $json['status'] = true;
            $json['message'] = "success";
            $json['redirect'] = url('/checkout/payment?order_id='.base64_encode($order->id)); 
            $html = 'Thank you for your order! We are processing it now and will send you an email with the details shortly.';
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
                if($getOrder->payment_method == 'cash')
                {
                    $getOrder->is_payment = 1;
                    $getOrder->save();

                    Mail::to($getOrder->email)->send(new OrderInvoiceMail($getOrder));
                    Cart::destroy();
                    Alert::success('Success!','Thank you for your order! We are processing it now and will send you an email with the details shortly.');
                    return redirect('cart');
                }
                else if($getOrder->payment_method == 'paypal')
                {

                }
                else if($getOrder->payment_method == 'stripe')
                {
                    Stripe::setApikey(env('STRIPE_SECRET'));
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
                        $data['setPublicKey'] = env('STRIPE_KEY');

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
        $trans_id = Session::get('stripe_session_id');
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $getdata = \Stripe\Checkout\Session::retrieve($trans_id);

        $getOrder = OrderModel::where('stripe_session_id', '=', $getdata->id)->first();

        if(!empty($getOrder) && !empty($getdata->id) && $getdata->id == $getOrder->stripe_session_id)
        {
            $getOrder->is_payment = 1;
            $getOrder->transaction_id = $getdata->id;
            $getOrder->payment_data = json_encode($getdata);
            $getOrder->save();

            Mail::to($getOrder->email)->send(new OrderInvoiceMail($getOrder));
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
            }
            else
            {
                ProductWishlist::DeleteRecord($request->product_id, Auth::user()->id);
                $json['is_Wishlist'] = 0;
            }
        $json['status'] = true;
        echo json_encode($json);
    }
}
