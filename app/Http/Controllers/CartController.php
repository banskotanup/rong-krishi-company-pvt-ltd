<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DiscountCode;
use App\Models\ShippingCharge;
use App\Models\OrderModel;
use App\Models\OrderItem;
use Cart;
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
            'price' => $total,
            'qty' => $request->qty,
        ]);
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
        $total = Cart::subTotal();
        if(!empty($getDiscount)){

            if($getDiscount->type == 'Amount'){
                $discount_amount  = floatval($getDiscount->percent_amount);
                $payable_total = floatval($total) - $discount_amount;
            }
            else{
                $discount_amount  = (floatval($total) * floatval($getDiscount->percent_amount)) / 100 ;
                $payable_total = floatval($total) - $discount_amount;

            }
            $json['status'] = true;
            $json['discount_amount'] = $discount_amount;
            $json['payable_total'] = $payable_total;
            $json['message'] = "success";
        }
        else{
            $json['status'] = false;
            $json['discount_amount'] = '0.00';
            $json['payable_total'] = floatval(Cart::subTotal());
            $json['message'] = "Invalid discount code";
        }

        echo json_encode($json);
    }

    public function place_order(Request $request)
    {
        $getShipping = ShippingCharge::getSingle($request->shipping);
        $payableTotal = Cart::subTotal();
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
        $order->$shipping_amount= trim($shipping_amount);
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
        die;
    }
}
