<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function blog_category_list(){
        $data['getRecords'] = BlogCategory::getCategory();
        $data['header_title'] = 'Blog Category';
        return view('admin.blog_category_pages.category_list', $data)->with('no', 1);
    }

    public function blog_category_add(){
        $data['header_title'] = 'Add New Blog Category';
        return view('admin.blog_category_pages.category_add', $data);
    }

    public function insert_blog_category(Request $request){
        request()->validate([
            'slug' => 'required|unique:blog_category'
        ]);
        $blog_category = new BlogCategory;
        $blog_category->name = trim($request->name);
        $blog_category->slug = trim($request->slug);
        $blog_category->status = trim($request->status);
        $blog_category->meta_title = trim($request->meta_title);
        $blog_category->meta_description = trim($request->meta_description);
        $blog_category->meta_keywords = trim($request->meta_keywords);
        $blog_category->save();
        return redirect('/blog_category_list')->with('success',"Blog Category created  successfully!!!");
    }

    public function edit_blog_category($id){
        $data['getRecords'] = BlogCategory::getSingle($id);
        $data['header_title'] = 'Edit Blog Category';
        return view('admin.blog_category_pages.category_edit', $data);
    }

    public function update_edit_blog_category($id, Request $request){
        request()->validate([
            'slug' => 'required|unique:blog_category,slug,'.$id
        ]);
        $blog_category = BlogCategory::getSingle($id);
        $blog_category->name = trim($request->name);
        $blog_category->slug = trim($request->slug);
        $blog_category->status = trim($request->status);
        $blog_category->meta_title = trim($request->meta_title);
        $blog_category->meta_description = trim($request->meta_description);
        $blog_category->meta_keywords = trim($request->meta_keywords);
        $blog_category->save();
        return redirect('/blog_category_list')->with('success',"Blog Category updated  successfully!!!");
    }

    public function delete_blog_category($id){
        $blog_category = BlogCategory::getSingle($id);
        $blog_category->is_delete = 1;
        $blog_category->save();
        return redirect('/blog_category_list')->with('success',"Blog Category deleted  successfully!!!");
    }
}
