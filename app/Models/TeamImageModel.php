<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamImageModel extends Model
{
    use HasFactory;

    protected $table = 'our_team_image';

    public function getImage(){
        if(!empty($this->image_name) && file_exists('upload/our_team/' .$this->image_name)){
            return url('upload/our_team/' .$this->image_name);
        }
        else{
            return "";
        }
    }

    static public function getSingle($id){
        return self::find($id);
    }
}
