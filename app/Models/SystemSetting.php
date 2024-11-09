<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;
use Auth;

class SystemSetting extends Model
{
    use HasFactory;

    protected $table = 'system_settings';

    static public function getSingle(){
        return self::find(1);
    }

    public function getLogo(){
        if(!empty($this->logo) && file_exists('upload/setting/'.$this->logo)){
            return url('upload/setting/'.$this->logo);
        }
        else{
            return "";
        }
    }

    public function getFevicon(){
        if(!empty($this->fevicon) && file_exists('upload/setting/'.$this->fevicon)){
            return url('upload/setting/'.$this->fevicon);
        }
        else{
            return "";
        }
    }
    public function getFooterPaymentIcon(){
        if(!empty($this->footer_payment_icon) && file_exists('upload/setting/'.$this->footer_payment_icon)){
            return url('upload/setting/'.$this->footer_payment_icon);
        }
        else{
            return "";
        }
    }
    public function getStoreImage(){
        if(!empty($this->store_image) && file_exists('upload/setting/'.$this->store_image)){
            return url('upload/setting/'.$this->store_image);
        }
        else{
            return "";
        }
    }

}
