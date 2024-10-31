<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DiscountCode;
use App\Models\ShippingCharge;
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
        if(!empty($getDiscount)){
            $total = Cart::subTotal();
            if($getDiscount->type == 'Amount'){
                $discountAmount  = $getDiscount->percent_amount;
                $payableTotal = $total - $getDiscount->percent_amount;
            }
            else{
                $discountAmount  = ($total * $getDiscount->percent_amount) / 100 ;
                $payableTotal = $total - $discountAmount;

            }
            $json['status'] = true;
            $json['discountAmount'] = number_format($discountAmount, 2);
            $json['payableTotal'] = number_format($payableTotal, 2);
            $json['message'] = 'success';
        }
        else{
            $json['status'] = false;
            $json['discountAmount'] = '0.00';
            $json['payableTotal'] = number_format(Cart::getSubTotal(), 2);
            $html = 'Invalid discount code';
            $json['html'] = $html;
        }

        echo json_encode($json);
    }
}
