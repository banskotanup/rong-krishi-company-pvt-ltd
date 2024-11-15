<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

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

    static function getUnreadNotification(){
        return Notification::where('is_read', '=', 0)
        ->where('user_id', '=', 1)
        ->orderBy('id', 'desc')
        ->get();
    }

    static function UpdateReadNoti($id){
        $getRecord = Notification::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_read = 1;
            $getRecord->save();
        }
    }

    
    static public function getNotification(){
        $return = Notification::select('notification.*');
        $return = $return
        ->orderBy('id', 'desc')
        ->paginate(15);
        return $return;
    }

}
