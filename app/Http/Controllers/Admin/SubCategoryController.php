<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function sub_category_list(){
        $data['getRecords'] = SubCategory::getSubCategory();
        $data['header_title'] = 'SubCategory';
        return view('admin.sub_category_pages.sub_category_list', $data)->with('no', 1);
    }

    public function sub_category_add(){
        $data['getCategory'] = Category::getCategory();
        $data['header_title'] = 'SubCategory-Add';
        return view('admin.sub_category_pages.sub_category_add', $data);
    }

    public function insert_sub_category(Request $request){
        request()->validate([
            'slug' => 'required|unique:sub_category'
        ]);
        $sub_category = new SubCategory;
        $sub_category->category_id = trim($request->category_id);
        $sub_category->name = trim($request->name);
        $sub_category->slug = trim($request->slug);
        $sub_category->status = trim($request->status);
        $sub_category->meta_title = trim($request->meta_title);
        $sub_category->meta_description = trim($request->meta_description);
        $sub_category->meta_keywords = trim($request->meta_keywords);
        $sub_category->created_by = Auth::user()->id;
        $sub_category->save();
        return redirect('/sub_category_list')->with('success',"Sub Category created  successfully!!!");
    }

    public function edit_sub_category($id){
        $data['getCategory'] = Category::getCategory();
        $data['getRecords'] = SubCategory::getSingle($id);
        $data['header_title'] = 'Subcategory-Edit';
        return view('admin.sub_category_pages.sub_category_edit', $data);
    }

    public function update_edit_sub_category($id, Request $request){
        request()->validate([
            'slug' => 'required|unique:sub_category,slug,'.$id
        ]);
        $sub_category = SubCategory::getSingle($id);
        $sub_category->category_id = trim($request->category_id);
        $sub_category->name = trim($request->name);
        $sub_category->slug = trim($request->slug);
        $sub_category->status = trim($request->status);
        $sub_category->meta_title = trim($request->meta_title);
        $sub_category->meta_description = trim($request->meta_description);
        $sub_category->meta_keywords = trim($request->meta_keywords);
        $sub_category->save();
        return redirect('/sub_category_list')->with('success',"Sub Category updated  successfully!!!");
    }

    public function delete_sub_category($id){
        $sub_category = SubCategory::getSingle($id);
        $sub_category->is_delete = 1;
        $sub_category->save();
        return redirect('/sub_category_list')->with('success',"Sub Category deleted  successfully!!!");
    }

    public function get_sub_category(Request $request){
        $category_id = $request->id;
        $get_sub_category = SubCategory::getSubCategoryRecord($category_id);
        $html = '';
        $html .= '<option value="">Select</option>';
        foreach($get_sub_category as $value){
            $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        $json['html'] = $html;
        echo json_encode($json);
    }
}
