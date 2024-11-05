<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('orders.*')
        ->where('is_payment', '=', 1)
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'asc')
        ->paginate(20);

        
    }
}
