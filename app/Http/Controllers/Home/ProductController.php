<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{

    public function getCategory($slug, $subSlug = ''){
        $getProductSingle = Product::getSingleSlug($slug);
        $getCategory = Category::getSingleSlug($slug);
        $getSubCategory = SubCategory::getSingleSlug($subSlug);

        if(!empty($getProductSingle)){
            $data['meta_title'] = $getProductSingle->title;
            $data['meta_description'] = $getProductSingle->short_description;
            $data['getProduct'] = $getProductSingle;
            $data['getRelatedProduct'] = Product::getRelatedProduct($getProductSingle->id, $getProductSingle->sub_category_id);
            return view('product.product_details', $data);
        }
        else  if(!empty($getCategory) && !empty($getSubCategory)){
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;
            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;
            $data['getSubCategoryFilter'] = SubCategory::getSubCategoryRecord($getCategory->id);
            $data['getProduct'] = Product::getProductRecords($getCategory->id, $getSubCategory->id);
            return view('product.product_list', $data);
        }
        else if(!empty($getCategory) ){

            $data['getSubCategoryFilter'] = SubCategory::getSubCategoryRecord($getCategory->id);
            $data['getCategory'] = $getCategory;

            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            $data['getProduct'] = Product::getProductRecords($getCategory->id);
            return view('product.product_list', $data);
        }
        else{
            abort(404);
        }
    }

    public function getProductSearch(Request $request){
            $data['meta_title'] = 'search';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';
            $getProduct = Product::getProductRecords();
            $data['getProduct'] = $getProduct;
            return view('product.product_list', $data);
    }
}
