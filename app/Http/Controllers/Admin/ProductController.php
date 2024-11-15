<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\ProductImageModel;
use Hash;
use Str;

class ProductController extends Controller
{
    public function product_list(){
        $data['getRecords'] = Product::getProduct();
        $data['header_title'] = 'Product';
        return view('admin.product_pages.product_list', $data)->with('no', 1);
    }

    public function product_add(){
        $data['header_title'] = 'Product-Add';
        return view('admin.product_pages.product_add', $data);
    }

    public function insert_product(Request $request){
        $title = trim($request->title);
        $product = new Product;
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->save();
        
        $slug = Str::slug($title, "-");
        $checkSlug = Product::checkSlug($slug);
        if(empty($checkSlug)){
            $product->slug = $slug;
            $product->save();
        }
        else{
            $new_slug = $slug.'-'.$product->id;
            $product->slug = $new_slug;
            $product->save();
        }
        return redirect('/product_add/'.$product->id);
        $product->save();
    }

    public function add_product($product_id){
        $product = Product::getSingle($product_id);
        if(!empty($product)){
            $data['getCategory'] = Category::getCategoryActive();
            $data['product'] = $product;
            $data['header_title'] = 'Product-Add';
            return view('admin.product_pages.product_add_details', $data);
        }
    }

    public function calculate_total(Request $request){
        $purchase_quantity = $request->purchase_quantity;
        $purchase_price = $request->purchase_price;
        if(!empty($purchase_price && $purchase_quantity)){
            $total_purchase_amount = $purchase_quantity * $purchase_price;
            $json['total'] = number_format($total_purchase_amount, 2);
            $json['status'] = true;
            $json['message'] = "success";
        }
        else{
            $json['status'] = false;
            $json['total'] = '0.00';
            $json['html'] = "";
        }
        echo json_encode($json);
    }

    public function update_add_product($product_id, Request $request){
        $product = Product::getSingle($product_id);
        if(!empty($product)){
            $product->title = trim($request->title);
            $product->sku= trim($request->sku);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->purchase_quantity = trim($request->purchase_quantity);
            $product->purchase_price = trim($request->purchase_price);
            $product->total_purchase_amount = trim($request->purchase_quantity * $request->purchase_price);
            $product->price = trim($request->price);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->additional_information = trim($request->additional_information);
            $product->shipping_returns = trim($request->shipping_returns);
            $product->status = trim($request->status);
            $product->save();

            if(!empty($request->file('image'))){
                foreach($request->file('image') as $value){
                    if($value){
                        $ext = $value->getClientOriginalExtension();
                        $randomStr = $product->id.Str::random(20);
                        $filename = strtolower($randomStr).'.'.$ext;
                        $value->move('upload/product/', $filename);

                        $imageupload  = new ProductImageModel;
                        $imageupload->image_name = $filename; 
                        $imageupload->image_extension = $ext; 
                        $imageupload->product_id = $product->id;
                        $imageupload->save(); 
                    }
                }
            }

            $inventory = new Inventory;
            $inventory->id = $product->id;
            $inventory->title = trim($request->title);
            $inventory->purchase_quantity = trim($request->purchase_quantity);
            $inventory->purchase_price = trim($request->purchase_price);
            $inventory->purchase_price = trim($request->purchase_price);
            $inventory->total_purchase_amount = trim($request->purchase_price * $request->purchase_quantity);
            $inventory->remaining_quantity = trim($request->purchase_quantity);
            $inventory->save();

            return redirect('/product_list');
        }
        else{
            abort(404);
        }
    }

    public function edit_product($product_id){
        $product = Product::getSingle($product_id);
        if(!empty($product)){
            $data['getCategory'] = Category::getCategoryActive();
            $data['getSubCategory'] = SubCategory::getSubCategoryActive();
            $data['product'] = $product;
            $data['header_title'] = 'Product-Edit';
            return view('admin.product_pages.product_edit', $data);
        }
    }

    public function update_edit_product($product_id, Request $request){
        $product = Product::getSingle($product_id);
        if(!empty($product)){
            $product->title = trim($request->title);
            $product->sku= trim($request->sku);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->purchase_quantity = trim($request->purchase_quantity);
            $product->purchase_price = trim($request->purchase_price);
            $product->total_purchase_amount = trim($request->purchase_quantity * $request->purchase_price);
            $product->price = trim($request->price);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->additional_information = trim($request->additional_information);
            $product->shipping_returns = trim($request->shipping_returns);
            $product->status = trim($request->status);
            $product->save();

            if(!empty($request->file('image'))){
                foreach($request->file('image') as $value){
                    if($value->isValid()){
                        $ext = $value->getClientOriginalExtension();
                        $randomStr = $product->id.Str::random(20);
                        $filename = strtolower($randomStr).'.'.$ext;
                        $value->move('upload/product/', $filename);

                        $imageupload  = new ProductImageModel;
                        $imageupload->image_name = $filename; 
                        $imageupload->image_extension = $ext; 
                        $imageupload->product_id = $product->id;
                        $imageupload->save(); 
                    }
                }
            }
            return redirect('/product_list');
        }
        else{
            abort(404);
        }
    }

    public function image_delete($id){
        $image = ProductImageModel::getSingle($id);
        if(!empty($image->getImage())){
            unlink('upload/product/' .$image->image_name);
        }
        $image->delete();
        return redirect()->back();
    }

    public function product_image_sortable(Request $request){
        if(!empty($request->photo_id)){
            $i = 1;
            foreach($request->photo_id as $photo_id){
                $image = ProductImageModel::getSingle($photo_id); 
                $image->order_by = $i;
                $image->save();
                $i++;   
            }
        }
        $json['success'] = true;
        echo json_encode($json);
    }

    public function delete_product($id){
        $product = Product::getSingle($id);
        $product->is_deleted = 1;
        $product->save();
        return redirect('/product_list');
    }
}