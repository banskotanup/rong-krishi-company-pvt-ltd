<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category_list(){
        $data['getRecords'] = Category::getCategory();
        $data['header_title'] = 'Category';
        return view('admin.category_pages.category_list', $data)->with('no', 1);
    }

    public function category_add(){
        $data['header_title'] = 'Category-Add';
        return view('admin.category_pages.category_add', $data);
    }

    public function insert_category(Request $request){
        request()->validate([
            'slug' => 'required|unique:category'
        ]);
        $category = new Category;
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('/category_list')->with('success',"Category created  successfully!!!");
    }

    public function edit_category($id){
        $data['getRecords'] = Category::getSingle($id);
        $data['header_title'] = 'Category-Edit';
        return view('admin.category_pages.category_edit', $data);
    }

    public function update_edit_category($id, Request $request){
        request()->validate([
            'slug' => 'required|unique:category,slug,'.$id
        ]);
        $category = Category::getSingle($id);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->save();
        return redirect('/category_list')->with('success',"Category updated  successfully!!!");
    }

    public function delete_category($id){
        $category = Category::getSingle($id);
        $category->is_delete = 1;
        $category->save();
        return redirect('/category_list')->with('success',"Category deleted  successfully!!!");
    }
}
