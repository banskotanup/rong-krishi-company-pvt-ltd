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

    public function Banner1(){
        if(!empty($this->banner1) && file_exists('upload/setting/'.$this->banner1)){
            return url('upload/setting/'.$this->banner1);
        }
        else{
            return "";
        }
    }
    public function Banner2(){
        if(!empty($this->banner2) && file_exists('upload/setting/'.$this->banner2)){
            return url('upload/setting/'.$this->banner2);
        }
        else{
            return "";
        }
    }
    public function Banner3(){
        if(!empty($this->banner3) && file_exists('upload/setting/'.$this->banner3)){
            return url('upload/setting/'.$this->banner3);
        }
        else{
            return "";
        }
    }
    public function Banner4(){
        if(!empty($this->banner4) && file_exists('upload/setting/'.$this->banner4)){
            return url('upload/setting/'.$this->banner4);
        }
        else{
            return "";
        }
    }
    public function Banner5(){
        if(!empty($this->banner5) && file_exists('upload/setting/'.$this->banner5)){
            return url('upload/setting/'.$this->banner5);
        }
        else{
            return "";
        }
    }
    public function Banner1_1(){
        if(!empty($this->banner1_1) && file_exists('upload/setting/'.$this->banner1_1)){
            return url('upload/setting/'.$this->banner1_1);
        }
        else{
            return "";
        }
    }
    public function Banner2_1(){
        if(!empty($this->banner2_1) && file_exists('upload/setting/'.$this->banner2_1)){
            return url('upload/setting/'.$this->banner5);
        }
        else{
            return "";
        }
    }
    public function Banner3_1(){
        if(!empty($this->banner3_1) && file_exists('upload/setting/'.$this->banner3_1)){
            return url('upload/setting/'.$this->banner3_1);
        }
        else{
            return "";
        }
    }

}
