<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\ContactUs;
use App\Models\BlogModel;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\SystemSetting;
use App\Mail\ContactUsMail;
use Auth;
use Mail;

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

    public function submit_contact(Request $request)
    {
        $save = new ContactUs;
        if(!empty(Auth::check()))
        {
            $save->user_id = Auth::user()->id;
        }
        $save->first_name = trim($request->name);
        $save->last_name = trim($request->last_name);
        $save->email = trim($request->email);
        $save->phone = trim($request->phone);
        $save->subject = trim($request->subject);
        $save->message = trim($request->message);
        $save->save();

        $getSystemSetting = SystemSetting::getSingle();
        Mail::to($getSystemSetting->email_one)->send(new ContactUsMail($save));
        toast('Message sent.','success')->autoClose(3000);
        return redirect()->back();
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
        // $getPage = BlogModel::getSlug();
        $data['getBlog'] = BlogModel::getBlog();
        $data['getBlogCategory'] = BlogCategory::getCategoryActive();
        $data['getPopular'] = BlogModel::getPopular();
        return view('homepages.blog', $data);
    }

    public function getShop(){
        $data['meta_title'] = 'Shop';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('product.shop', $data);
    }

    public function blog_detail($slug){
        $getBlog = BlogModel::getSingleSlug($slug);

        if(!empty($getBlog)){
            $total_view = $getBlog->total_view;
            $getBlog->total_view = $total_view + 1;
            $getBlog->save();

            $data['getBlog'] = $getBlog;
            $data['meta_title'] = $getBlog->meta_title;
            $data['meta_description'] = $getBlog->meta_description;
            $data['meta_keywords'] = $getBlog->meta_keywords;
            $data['getBlogCategory'] = BlogCategory::getCategoryActive();
            $data['getPopular'] = BlogModel::getPopular();
            $data['getRelatedBlog'] = BlogModel::getRelatedBlog($getBlog->id, $getBlog->blog_category_id);
            return view('homepages.blog_detail', $data);
        }
        else{
            abort(404);
        }
        
    }

    public function submit_blog_comment(Request $request){
        $comment = new BlogComment;
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = trim($request->blog_id);
        $comment->comment = trim($request->comment);
        $comment->save();
        toast('Comment posted.','success')->autoClose(3000);
        return redirect()->back();
    }

    public function blog_category($slug){
        $getCategory = BlogCategory::getSingleSlug($slug);

        if(!empty($getCategory)){
            $data['getCategory'] = $getCategory;
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            $data['getBlogCategory'] = BlogCategory::getCategoryActive();
            $data['getPopular'] = BlogModel::getPopular();
            $data['getBlog'] = BlogModel::getBlog($getCategory->id);
            return view('homepages.blog_category', $data);
        }
        else{
            abort(404);
        }
    }
}
