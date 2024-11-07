<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    static public function getCategory(){
        $return = Category::select('category.*', 'users.name as created_by_name');
        if(!empty(Request::get('name'))){
            $return = $return->where('category.name', '=', Request::get('name'));
        }
        if(!empty(Request::get('from_date'))){
            $return = $return->whereDate('category.created_at', '>=', Request::get('from_date'));
        }
        if(!empty(Request::get('to_date'))){
            $return = $return->where('category.created_at', '<=', Request::get('to_date'));
        }
        $return = $return->join('users', 'users.id', '=', 'category.created_by')
        ->where('category.is_delete','=', 0)
        ->orderBy('category.id', 'asc')
        ->paginate(20);
        return $return;
    }

    static public function getCategoryActive(){
        return self::select('category.*')
        ->join('users', 'users.id', '=', 'category.created_by')
        ->where('category.is_delete','=', 0)
        ->where('category.status','=', 0)
        ->orderBy('category.name', 'asc')
        ->get();
    }

    static public function getCategoryMenu(){
        return self::select('category.*')
        ->join('users', 'users.id', '=', 'category.created_by')
        ->where('category.is_delete','=', 0)
        ->where('category.status','=', 0)
        ->get();
    }

    static public function getSingle($id){
        return Category::find($id);
    }

    public function getSubCategory(){
        return $this->hasMany(SubCategory::class, "category_id")
        ->where('sub_category.status','=', 0)
        ->where('sub_category.is_delete','=', 0);
    }

    static public function getSingleSlug($slug){
        return self::where('slug', '=', $slug)
        ->where('category.status', '=',  0)
        ->where('category.is_delete', '=',  0)
        ->first();
    }
}
