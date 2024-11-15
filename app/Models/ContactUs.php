<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('contact_us.*')
        ->where('is_deleted', '=', 0)
        ->orderBy('contact_us.id', 'desc')
        ->paginate(20);
    }
}
