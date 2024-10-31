<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\RegisterMail;

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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 0;
        $user->save();

        Mail::to($user->email)->send(new RegisterMail($user));
        return redirect('/member_list')->with('success',"Member Created Successfully!
        Please check your email for the verification message to complete the process.
        If you don’t receive the email, check your spam or junk folder. ");
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
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->is_admin = 0;
        $user->save();
        return redirect('/member_list')->with('success',"Member updated  successfully!!!");
    }

    public function delete_member($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('/member_list')->with('success',"Member deleted  successfully!!!");
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
