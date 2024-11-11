<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class OurTeam extends Model
{
    use HasFactory;

    protected $table = 'our_team';

    static public function getSingle($id){
        return OurTeam::find($id);
    }

    static public function getTeam(){
        $return = OurTeam::select('our_team.*');
        if(!empty(Request::get('first_name'))){
            $return = $return->where('first_name', '=', Request::get('first_name'));
        }
        if(!empty(Request::get('last_name'))){
            $return = $return->where('last_name', '=', Request::get('last_name'));
        }
        if(!empty(Request::get('email'))){
            $return = $return->where('email', '=', Request::get('email'));
        }
        if(!empty(Request::get('whatsapp_number'))){
            $return = $return->where('whatsapp_number', '=', Request::get('whatsapp_number'));
        }
        if(!empty(Request::get('address'))){
            $return = $return->where('address', '=', Request::get('address'));
        }
        $return = $return
        ->where('is_deleted','=', 0)
        ->orderBy('id', 'asc')
        ->paginate(10);
        return $return;
    }

    static public function getImageSingle($id){
        return TeamImageModel::where('user_id','=', $id)->orderBy('order_by', 'asc')->first();
    }

    public function getImage(){
        return $this->hasMany(TeamImageModel::class, "user_id")->orderBy('order_by', 'asc');
    }


}
