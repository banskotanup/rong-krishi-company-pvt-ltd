<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'our_inventory';
    static public function getSingle($product_id)
    {
        return self::find($product_id);
    }

    static public function getRecord(){
        $return = Inventory::select('our_inventory.*');
        if(!empty(Request::get('product_name'))){
            $return = $return->where('title', '=', Request::get('product_name'));
        }

        $return = $return
        ->where('is_deleted', '=', 0)
        ->orderBy('our_inventory.title', 'asc')
        ->paginate(20);

        return $return;
    }
}
