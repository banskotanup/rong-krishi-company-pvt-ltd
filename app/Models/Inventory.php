<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'our_inventory';
    static public function getSingle($product_id)
    {
        return self::find($product_id);
    }

    static public function getRecord(){
        return self::select('our_inventory.*')
        ->where('is_deleted', '=', 0)
        ->orderBy('our_inventory.title', 'asc')
        ->paginate(20);
    }
}
