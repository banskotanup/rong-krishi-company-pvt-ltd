<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImageModel extends Model
{
    use HasFactory;

    protected $table = 'blog_image';

    public function getImage(){
        if(!empty($this->image_name) && file_exists('upload/blog/' .$this->image_name)){
            return url('upload/blog/' .$this->image_name);
        }
        else{
            return "";
        }
    }

    static public function getSingle($id){
        return self::find($id);
    }
}
