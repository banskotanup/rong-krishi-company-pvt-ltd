<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class UserController extends Controller
{
    public function dashboard(){
        $data['meta_title'] = 'Dashboard';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $data['total_orders'] = Order::getTotalOrderUser(Auth::user()->id);
        $data['today_orders'] = Order::getTodayOrderUser(Auth::user()->id);
        $data['total_amount'] = Order::getTotalAmountUser(Auth::user()->id);
        $data['today_amount'] = Order::getTodayAmountUser(Auth::user()->id);


        $data['total_pending'] = Order::getTotalStatusUser(Auth::user()->id, 0);
        $data['total_inprogress'] = Order::getTotalStatusUser(Auth::user()->id, 1);
        $data['total_completed'] = Order::getTotalStatusUser(Auth::user()->id, 3);
        $data['total_cancelled'] = Order::getTotalStatusUser(Auth::user()->id, 4);

        return view('user.dashboard', $data);
    }

    public function user_orders(){
        $data['meta_title'] = 'Orders';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.orders', $data);
    }

    public function edit_profile(){
        $data['meta_title'] = 'Edit Profile';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.edit_profile', $data);
    }

    public function change_password(){
        $data['meta_title'] = 'Change Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.change_password', $data);
    }
}
