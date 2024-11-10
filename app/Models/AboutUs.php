<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    static public function getSingle(){
        return self::find(1);
    }

    public function getImage(){
        if(!empty($this->about_us_image) && file_exists('upload/about_us/'.$this->about_us_image)){
            return url('upload/about_us/'.$this->about_us_image);
        }
        else{
            return "";
        }
    }

}
