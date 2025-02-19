<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = 'carts';
    
    static public function getSingle($id)
    {
        return self::find($id);
    }
    
    static public function DeleteRecord($product_id, $user_id)
    {
        self::where('product_id','=',$product_id)->where('user_id','=',$user_id)->delete();
    }
    
    static public function checkAlready($product_id, $user_id)
    {
        return self::where('product_id','=',$product_id)->where('user_id','=',$user_id)->count();
    }
}
