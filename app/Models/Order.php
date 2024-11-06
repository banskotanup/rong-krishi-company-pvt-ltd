<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

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

    public function getShipping(){
        return $this->belongsTo(ShippingCharge::class, 'shipping_id');
    }

    public function getItem(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
