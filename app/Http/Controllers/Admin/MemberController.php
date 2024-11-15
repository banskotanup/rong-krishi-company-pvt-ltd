<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\RegisterMail;
use Str;

class MemberController extends Controller
{
    public function member_list(){
        $data['getRecords'] = User::getMember();
        $data['header_title'] = 'Member';
        return view('admin.member_pages.member_list', $data)->with('no', 1);
    }

    public function member_add(){
        $data['header_title'] = 'Member-Add';
        return view('admin.member_pages.member_add', $data);
    }

    public function insert_member(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new User;
        $user->user_number = mt_rand(100000000,999999999);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 0;
        $user->remember_token = Str::random(30);
        $user->save();

        Mail::to($user->email)->send(new RegisterMail($user));

        $user_id = $user->id;
        $url = url('/member_list');
        $message = "New Customer Registered #".$user->user_number." #Name".$user->name;
        Notification::insertRecord($user_id, $url, $message);

        return redirect('/member_list');
    }

    public function edit_member($id){
        $data['getRecords'] = User::getSingle($id);
        $data['header_title'] = 'Member-Edit';
        return view('admin.member_pages.member_edit', $data);
    }

    public function update_edit_member($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->address = $request->address;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->is_admin = 0;
        $user->remember_token = Str::random(30);
        $user->save();
        return redirect('/member_list');
    }

    public function delete_member($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('/member_list');
    }

    public function activate_email($id){
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect('/ipChange')->with('succes',"✅ Success! Your account has been verified.

                    For your security, we recommend that you enter your email below & change your password immediately.");
    }
}
