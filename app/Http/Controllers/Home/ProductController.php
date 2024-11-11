<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Auth;

class ProductController extends Controller
{
    public function my_wishlist()
    {
        $data['meta_title'] = 'My Wishlist';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $data['getProduct'] = Product::getMyWishlist(Auth::user()->id);

        return view('product.my_wishlist', $data);
    }


    public function getCategory($slug, $subslug = ''){
        $getProductSingle = Product::getSingleSlug($slug);
        $getCategory = Category::getSingleSlug($slug);
        $getSubCategory = SubCategory::getSingleSlug($subslug);

        if(!empty($getProductSingle)){
            $data['meta_title'] = $getProductSingle->title;
            $data['meta_description'] = $getProductSingle->short_description;
            $data['getProduct'] = $getProductSingle;
            $data['getRelatedProduct'] = Product::getRelatedProduct($getProductSingle->id, $getProductSingle->sub_category_id);
            return view('product.product_details', $data);
        }

        else if(!empty($getCategory) && !empty($getSubCategory)){
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;
            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;
            $data['getSubCategoryFilter'] = SubCategory::getSubCategoryRecord($getCategory->id);
            $getProduct = Product::getProductRecords($getCategory->id, $getSubCategory->id);
            $page = 0;
            if(!empty($getProduct->nextPageUrl()))
            {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if(!empty($parse_url['query']))
                {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            $data['getProduct'] = $getProduct;
            return view('product.product_list', $data);
        }
        else if(!empty($getCategory) ){

            $data['getSubCategoryFilter'] = SubCategory::getSubCategoryRecord($getCategory->id);
            $data['getCategory'] = $getCategory;

            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            $getProduct = Product::getProductRecords($getCategory->id);
            $page = 0;
            if(!empty($getProduct->nextPageUrl()))
            {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if(!empty($parse_url['query']))
                {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            $data['getProduct'] = $getProduct;
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
            $page = 0;
            if(!empty($getProduct->nextPageUrl()))
            {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if(!empty($parse_url['query']))
                {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            return view('product.product_list', $data);
    }

    public function getFilterProductAjax(Request $request)
    {
        $getProduct = Product::getProductRecords();
        $page = 0;
            if(!empty($getProduct->nextPageUrl()))
            {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if(!empty($parse_url['query']))
                {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
        return response()->json([
            "status" => true,
            "page" => $page,
            "success" => view("product._list", [
                "getProduct" => $getProduct,
            ])->render(),
            ], 200);
    }
}
