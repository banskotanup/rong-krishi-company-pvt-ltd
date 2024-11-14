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

    static public function getImageSingle($id){
        return BlogImageModel::where('blog_id','=', $id)->orderBy('order_by', 'asc')->first();
    }

    public function getImage(){
        return $this->hasMany(BlogImageModel::class, "blog_id")->orderBy('order_by', 'asc');
    }

    static public function getBlog(){
        $return = self::select('blog.*');

        if(!empty(Request::get('search'))){
            $return = $return->where('blog.title', 'like', '%'.request::get('search').'%');
        }

        $return = $return->where('blog.is_delete','=', 0)
        ->where('blog.status','=', 0)
        ->orderBy('blog.id', 'desc')
        ->paginate(10);

        return $return;
    }
    static public function getPopular(){
        $return = self::select('blog.*');
        $return = $return->where('blog.is_delete','=', 0)
        ->where('blog.status','=', 0)
        ->orderBy('blog.total_view', 'desc')
        ->limit(6)
        ->get();

        return $return;
    }

    static public function getRelatedBlog($blog_id, $blog_category_id){
        $return = self::select('blog.*');
        $return = $return->where('blog.is_delete','=', 0)
        ->where('blog.status','=', 0)
        ->where('blog.blog_category_id','=', $blog_category_id)
        ->where('blog.id','!=', $blog_id)
        ->orderBy('blog.total_view', 'desc')
        ->limit(6)
        ->get();

        return $return;
    }

    public function getComment(){
        return $this->hasMany(BlogComment::class, "blog_id")
        ->select('blog_comment.*')
        ->join('users', 'users.id', '=', 'blog_comment.user_id')
        ->orderBy('blog_comment.id', 'desc');
    }
    
    public function getCommentCount(){
        return $this->hasMany(BlogComment::class, "blog_id")
        ->select('blog_comment.id')
        ->join('users', 'users.id', '=', 'blog_comment.user_id')
        ->count();
    }


}
