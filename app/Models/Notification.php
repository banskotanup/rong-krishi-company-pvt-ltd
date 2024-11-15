<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notification';
    static public function getSingle($id){
        return self::find($id);
    }

    static function insertRecord($user_id, $url, $message){
        $save = new Notification;
        $save->user_id = $user_id;
        $save->url = $url;
        $save->message = $message;
        $save->save();
    }

}
