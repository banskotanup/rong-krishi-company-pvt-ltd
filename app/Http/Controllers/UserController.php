<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Notification;
use Auth;
use Mail;
use App\Mail\OrderStatusMail;
use Hash;
use Str;
use RealRashid\SweetAlert\Facades\Alert;

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

        $data['getRecords'] = User::getSingleUser(Auth::user()->id);
        $data['total_pending'] = Order::getTotalStatusUser(Auth::user()->id, 0);
        $data['total_inprogress'] = Order::getTotalStatusUser(Auth::user()->id, 1);
        $data['total_completed'] = Order::getTotalStatusUser(Auth::user()->id, 3);
        $data['total_cancelled'] = Order::getTotalStatusUser(Auth::user()->id, 4);

        return view('user.dashboard', $data);
    }

    public function user_orders(){
        $data['getRecords'] = Order::getRecordUser(Auth::user()->id);
        $data['getRecordCount'] = Order::getRecordCount(Auth::user()->id);
        $data['meta_title'] = 'Orders';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.orders', $data)->with('no', 1);
    }

    public function user_order_view($id){
        $data['getRecords'] = Order::getSingleUser($id);
        $data['meta_title'] = 'Orders';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.order_view', $data)->with('no', 1);
    }

    public function edit_profile(){
        $data['meta_title'] = 'Edit Profile';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getRecords'] = User::getSingle(Auth::user()->id);

        return view('user.edit_profile', $data);
    }

    public function update_profile(Request $request){
        $user = User::getSingle(Auth::user()->id);
        if(empty(Auth::user()->user_number)){
            $user->user_number = mt_rand(100000000,999999999);
        }
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->company_name = trim($request->company_name);
        $user->country = trim($request->country);
        $user->address = trim($request->address);
        $user->address_two = trim($request->address_two);
        $user->city = trim($request->city);
        $user->state = trim($request->state);
        $user->postcode = trim($request->postcode);
        $user->phone = trim($request->phone);
        $user->remember_token = Str::random(30);
        $user->save();

        $user_id = 1;
        $url = url('/member_list');
        $message = "Customer Profile Updated #".$user->user_number." #Name".$user->name;
        Notification::insertRecord($user_id, $url, $message);

        Alert::success('Success!','User profile updated.');
        return redirect(url('/user_dashboard/{id}'));
    }

    public function user_order_status(Request $request){
        $getOrder = Order::getSingleUser($request->order_id);
        $getOrder->status = $request->status;
        $getOrder->save();
        Mail::to($getOrder->email)->send(new OrderStatusMail($getOrder));

        $user_id = 1;
        $url = url('/order_view/'.$getOrder->id);
        $message = "Order Status Updated #".$getOrder->order_number;
        Notification::insertRecord($user_id, $url, $message);

        $json['message'] = "Status successfully updated";
        toast('Order has been cancelled.','success')->autoClose(3000);
        echo json_encode($json);
    }
    

    public function changePw404(){
            $data['meta_title'] = 'Change Password';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';
            return view('user.change_password_error', $data);
    }

    public function changePw($token){
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            $data['meta_title'] = 'Change Password';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';
            return view('user.change_password', $data);
        }
        else{
            
        }
    }

    public function authChangePw($token, Request $request){
        if(Hash::check($request->old_password, Auth::user()->password)){
            if($request->password == $request->cpassword){
                $user = User::where('remember_token', '=', $token)->first();
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(30);
                $user->email_verified_at = date('Y-m-d H:i:s');
                $user->save();
                Alert::success('Success!','Password changed successfully!!!');
                return redirect(url('/user_dashboard/{id}'));
            }
            else{
                return redirect()->back()->with('err', "Password and confirm password does not match.");
            }
        }
        else{
            return redirect()->back()->with('err', "Old password is not correct.");
        }
        
    }
}
