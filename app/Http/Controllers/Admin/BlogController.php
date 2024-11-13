<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\BlogModel;
use App\Models\BlogCategory;
use Str;
use App\Models\BlogImageModel;


class BlogController extends Controller
{
    public function admin_blog(){
        $data['getRecords'] = BlogModel::getCategory();
        $data['header_title'] = 'Blog';
        return view('admin.blog_pages.category_list', $data)->with('no', 1);
    }

    public function blog_add(){
        $data['getCategory'] = BlogCategory::getCategoryActive();
        $data['header_title'] = 'Add New Blog';
        return view('admin.blog_pages.category_add', $data);
    }

    public function insert_blog(Request $request){
       
        $blog = new BlogModel;
        $blog->title = trim($request->title);
        $blog->blog_category_id = trim($request->blog_category_id);
        $blog->description = trim($request->description);
        $blog->blog_content = trim($request->blog_content);
        $blog->status = trim($request->status);
        $blog->meta_title = trim($request->meta_title);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);

        $slug = str::slug($request->title);
        $count = BlogModel::where('slug', '=', $slug)->count();
        if(!empty($count))
        {
            $blog->slug = $slug.'-'.$blog->id;
        }
        else
        {
            $blog->slug = trim($slug);
        }

        $blog->save();
        
        if(!empty($request->file('image_name'))){
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/blog/', $filename);

            $imageupload  = new BlogImageModel;
            $imageupload->image_name = $filename; 
            $imageupload->blog_id = $blog->id;
            $imageupload->save(); 
        }
        return redirect('/admin_blog');
    }

    public function edit_blog($id){
        $data['getCategory'] = BlogCategory::getCategoryActive();
        $data['getRecords'] = BlogModel::getSingle($id);
        $data['header_title'] = 'Edit Blog';
        return view('admin.blog_pages.category_edit', $data);
    }

    public function update_edit_blog($id, Request $request){
       
        $blog = BlogModel::getSingle($id);
        $blog->title = trim($request->title);
        $blog->blog_category_id = trim($request->blog_category_id);
        $blog->description = trim($request->description);
        $blog->blog_content = trim($request->blog_content);
        $blog->status = trim($request->status);
        $blog->meta_title = trim($request->meta_title);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);

        $slug = str::slug($request->title);
        $count = BlogModel::where('slug', '=', $slug)->count();
        if(!empty($count))
        {
            $blog->slug = $slug.'-'.$blog->id;
        }
        else
        {
            $blog->slug = trim($slug);
        }

        $blog->save();
        
        if(!empty($request->file('image_name'))){
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/blog/', $filename);

            $imageupload  = BlogImageModel::getSingle($id);
            $imageupload->image_name = $filename; 
            $imageupload->blog_id = $blog->id;
            $imageupload->save(); 
        }
        return redirect('/admin_blog');
    }

    public function delete_blog($id){
        $blog = BlogModel::getSingle($id);
        $blog->is_delete = 1;
        $blog->save();
        return redirect('/admin_blog');
    }
}
