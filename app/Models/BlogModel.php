<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blog';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getCategory(){
        $return = BlogModel::select('blog.*')
        ->where('blog.is_delete','=', 0)
        ->orderBy('blog.id', 'asc')
        ->paginate(20);
        return $return;
    }

    static public function getCategoryActive(){
        return self::select('blog.*')
        ->where('blog.is_delete','=', 0)
        ->where('blog.status','=', 0)
        ->orderBy('blog.name', 'asc')
        ->get();
    }

    static public function getSingleSlug($slug){
        return self::where('slug', '=', $slug)
        ->where('blog.status', '=',  0)
        ->where('blog.is_delete', '=',  0)
        ->first();
    }
}
