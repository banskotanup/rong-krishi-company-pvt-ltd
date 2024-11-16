<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\BlogModel;
use Cart;
use Surfsidemedia\Shoppingcart\CartItem;
use Surfsidemedia\Shoppingcart\CartItemOptions;

class LandingPageController extends Controller
{
    public function welcome()
    {
        $data['meta_title'] = 'Rong Krishi Company';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getOurProduct'] = Product::getOurProduct();
        $data['getBlog'] = BlogModel::getBlog();
        
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1){
            return redirect('/admin_dashboard');
        }
        if(!empty(Auth::check())){
            $user_id = Auth::user()->id;   
            Cart::restore($user_id);
            $cartItems = Cart::content();
        }
        $cartItems = Cart::content();
        return view('index', compact('cartItems'), $data);
    }
}
