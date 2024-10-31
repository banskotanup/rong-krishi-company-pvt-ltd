<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    static public function getCategory(){
        return self::select('category.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=', 'category.created_by')
        ->where('category.is_delete','=', 0)
        ->orderBy('category.id', 'asc')
        ->paginate(20);
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
