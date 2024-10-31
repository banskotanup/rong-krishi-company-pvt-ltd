<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function index(){
        $data['meta_title'] = 'Rong Krishi Company';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getOurProduct'] = Product::getOurProduct();
        return view('index', $data);
    }

    public function about_us(){
        $data['meta_title'] = 'About Us';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('homepages.about', $data);
    }

    public function contact_us(){
        $data['meta_title'] = 'Contact Us';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('homepages.contact', $data);
    }

    public function faq(){
        $data['meta_title'] = 'FAQs';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('homepages.faq', $data);
    }

    public function error_404(){
        $data['meta_title'] = 'Error 404';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('homepages.error_404', $data);
    }

    public function blog(){
        $data['meta_title'] = 'Blog';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('homepages.blog', $data);
    }

    public function getShop(){
        $data['meta_title'] = 'Shop';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('product.shop', $data);
    }
}
