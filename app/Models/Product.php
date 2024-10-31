<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    static public function checkSlug($slug){
        return self::where('slug','=',$slug)->count();
    }

    static public function getSingle($id){
        return Product::find($id);
    }

    static public function getProduct(){
        return self::select('product.*', 'users.name as created_by_name', 'category.name as category_name', 'sub_category.name as sub_category_name')
        ->join('category', 'category.id', '=', 'product.category_id')
        ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id')
        ->orderBy('product.id', 'asc')
        ->join('users', 'users.id', '=', 'product.created_by')
        ->where('product.is_deleted', '=', 0)
        ->paginate(20);
    }

    public function getImage(){
        return $this->hasMany(ProductImageModel::class, "product_id")->orderBy('order_by', 'asc');
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
        $return = $return->where('product.is_deleted', '=', 0)
        ->where('product.status', '=', 0)
        ->orderBy('product.id', 'asc')
        ->paginate(20);

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
