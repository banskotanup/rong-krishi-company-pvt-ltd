<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_category';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getCategory(){
        $return = BlogCategory::select('blog_category.*')
        ->where('blog_category.is_delete','=', 0)
        ->orderBy('blog_category.id', 'asc')
        ->paginate(20);
        return $return;
    }

    static public function getCategoryActive(){
        return self::select('blog_category.*')
        ->where('blog_category.is_delete','=', 0)
        ->where('blog_category.status','=', 0)
        ->orderBy('blog_category.name', 'asc')
        ->get();
    }

    static public function getSingleSlug($slug){
        return self::where('slug', '=', $slug)
        ->where('blog_category.status', '=',  0)
        ->where('blog_category.is_delete', '=',  0)
        ->first();
    }
}
