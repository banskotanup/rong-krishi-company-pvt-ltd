<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class BlogComment extends Model
{
    use HasFactory;

    protected $table = 'blog_comment';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getUser(){
        return $this->belongsTo(User::class, "user_id");
    }
}
