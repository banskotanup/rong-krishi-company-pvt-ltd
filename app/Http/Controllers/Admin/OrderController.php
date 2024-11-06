<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function order_list(){
        $data['getRecords'] = Order::getRecord();
        $data['header_title'] = 'Orders';
        return view('admin.order_pages.order_list', $data)->with('no', 1);
    }

    public function order_view($id){
        $data['getRecords'] = Order::getSingle($id);
        $data['header_title'] = 'Order Details';
        return view('admin.order_pages.order_detail', $data)->with('no', 1);
    }


}
