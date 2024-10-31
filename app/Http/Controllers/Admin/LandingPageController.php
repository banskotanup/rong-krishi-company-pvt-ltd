<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class LandingPageController extends Controller
{
    public function welcome()
    {
        $data['meta_title'] = 'Rong Krishi Company';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getOurProduct'] = Product::getOurProduct();
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1){
            return redirect('/admin_dashboard');
        }
        return view('index', $data);
    }
}
