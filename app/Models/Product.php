<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    static public function checkSlug($slug){
        return self::where('slug','=',$slug)->count();
    }

    static public function checkWishlist($product_id)
    {
        return ProductWishlist::checkAlready($product_id, Auth::user()->id);
    }

    static public function getSingle($id){
        return Product::find($id);
    }

    static public function getProduct(){
        $return = Product::select('product.*', 'users.name as created_by_name', 'category.name as category_name', 'sub_category.name as sub_category_name');
        if(!empty(Request::get('product_name'))){
            $return = $return->where('product.title', '=', Request::get('product_name'));
        }
        if(!empty(Request::get('category_name'))){
            $return = $return->where('category.name', '=', Request::get('category_name'));
        }
        if(!empty(Request::get('sub_category_name'))){
            $return = $return->where('sub_category.name', '=', Request::get('sub_category_name'));
        }
        if(!empty(Request::get('from_date'))){
            $return = $return->whereDate('sub_category.created_at', '>=', Request::get('from_date'));
        }
        if(!empty(Request::get('to_date'))){
            $return = $return->where('sub_category.created_at', '<=', Request::get('to_date'));
        }
        $return = $return->join('category', 'category.id', '=', 'product.category_id')
        ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
        ->orderBy('product.id', 'asc')
        ->join('users', 'users.id', '=', 'product.created_by')
        ->where('product.is_deleted', '=', 0)
        ->paginate(20);
        return $return;
    }

    public function getImage(){
        return $this->hasMany(ProductImageModel::class, "product_id")->orderBy('order_by', 'asc');
    }

    static public function getMyWishlist($user_id)
    {
        $return = Product::select('product.*', 'users.name as created_by_name', 'category.name as category_name', 
        'category.slug as category_slug','sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
        ->join('users', 'users.id', '=', 'product.created_by')
        ->join('category', 'category.id', '=', 'product.category_id')
        ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
        ->join('product_wishlist', 'product_wishlist.product_id', '=', 'product.id')
        ->where('product_wishlist.user_id', '=', $user_id)
       
        ->where('product.is_deleted', '=', 0)
        ->where('product.status', '=', 0)
        ->orderBy('product.id', 'asc')
        ->paginate(3);

        return $return;
    }

    static public function getProductRecords($category_id = '', $sub_category_id = ''){
        $return = Product::select('product.*', 'users.name as created_by_name', 'category.name as category_name', 
        'category.slug as category_slug','sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
        ->join('users', 'users.id', '=', 'product.created_by')
        ->join('category', 'category.id', '=', 'product.category_id')
        ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id');
        if(!empty($category_id)){
            $return = $return->where('product.category_id', '=', $category_id);
        }
        if(!empty($sub_category_id)){
            $return = $return->where('product.sub_category_id', '=', $sub_category_id);
        }

        if(!empty(Request::get('q'))){
            $return = $return->where('product.title', 'like', '%'.Request::get('q').'%');
        }

        if(!empty(Request::get('sub_category_id')))
        {
            $sub_category_id = rtrim(Request::get('sub_category_id'), ',');
            $sub_category_id_array = explode(",", $sub_category_id);
            $return = $return->whereIn('product.sub_category_id', $sub_category_id_array);
        }

        else
        {
            if(!empty(Request::get('old_category_id')))
            {
                $return = $return->where('product.category_id', '=', Request::get('old_category_id'));
            }
            
            if(!empty(Request::get('old_sub_category_id')))
            {
                $return = $return->where('product.sub_category_id', '=', Request::get('old_sub_category_id'));
            }
        }
        if(!empty(Request::get('start_price')) && !empty(Request::get('end_price')))
        {
            $start_price = str_replace('NPR', '', Request::get('start_price'));
            $end_price = str_replace('NPR', '', Request::get('end_price'));
            $return = $return->where('product.price', '>=', $start_price);
            $return = $return->where('product.price', '<=', $end_price);
        }


        $return = $return->where('product.is_deleted', '=', 0)
        ->where('product.status', '=', 0)
        ->orderBy('product.id', 'asc')
        ->paginate(3);

        return $return;

    }

    static public function getImageSingle($product_id){
        return ProductImageModel::where('product_id','=', $product_id)->orderBy('order_by', 'asc')->first();
    }

    static public function getSingleSlug($slug){
        return self::where('slug','=',$slug)
        ->where('product.is_deleted', '=', 0)
        ->where('product.status', '=', 0)
        ->first();
    }

    public function getCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getSubCategory(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    static public function getRelatedProduct($product_id, $sub_category_id){
        $return = Product::select('product.*', 'users.name as created_by_name', 'category.name as category_name', 
        'category.slug as category_slug','sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
        ->join('users', 'users.id', '=', 'product.created_by')
        ->join('category', 'category.id', '=', 'product.category_id')
        ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
        ->where('product.id', '!=', $product_id)
        ->where('product.sub_category_id', '=', $sub_category_id)
        ->where('product.is_deleted', '=', 0)
        ->where('product.status', '=', 0)
        ->orderBy('product.id', 'asc')
        ->limit(10)
        ->get();

        return $return;
    }

    static public function getOurProduct(){
        $return = Product::select('product.*', 'users.name as created_by_name', 'category.name as category_name', 
        'category.slug as category_slug','sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
        ->join('users','users.id', '=', 'product.created_by')
        ->join('category','category.id', '=', 'product.category_id')
        ->join('sub_category','sub_category.id', '=', 'product.sub_category_id')
        ->where('product.isProduct','=',0)
        ->where('product.is_deleted','=',0)
        ->where('product.status','=',0)
        ->orderBy('product.id', 'desc')
        ->limit(12)
        ->get();
        return $return;
    }
}
