<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        $return = Order::select('orders.*');
        if(!empty(Request::get('order_number'))){
            $return = $return->where('order_number', '=', Request::get('order_number'));
        }
        if(!empty(Request::get('first_name'))){
            $return = $return->where('first_name', '=', Request::get('first_name'));
        }
        if(!empty(Request::get('last_name'))){
            $return = $return->where('last_name', '=', Request::get('last_name'));
        }
        if(!empty(Request::get('email'))){
            $return = $return->where('email', '=', Request::get('email'));
        }
        if(!empty(Request::get('phone'))){
            $return = $return->where('phone', '=', Request::get('phone'));
        }
        if(!empty(Request::get('country'))){
            $return = $return->where('country', '=', Request::get('country'));
        }
        if(!empty(Request::get('state'))){
            $return = $return->where('state', '=', Request::get('state'));
        }
        if(!empty(Request::get('city'))){
            $return = $return->where('city', '=', Request::get('city'));
        }
        if(!empty(Request::get('postcode'))){
            $return = $return->where('postcode', '=', Request::get('postcode'));
        }
        if(!empty(Request::get('from_date'))){
            $return = $return->whereDate('created_at', '>=', Request::get('from_date'));
        }
        if(!empty(Request::get('to_date'))){
            $return = $return->where('created_at', '<=', Request::get('to_date'));
        }
        $return = $return->where('is_payment', '=', 1)
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->paginate(20);

        return $return;
    }

    public function getShipping(){
        return $this->belongsTo(ShippingCharge::class, 'shipping_id');
    }

    public function getItem(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
