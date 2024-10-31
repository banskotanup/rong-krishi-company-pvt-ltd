<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Hash;
use Mail;
use Str;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use App\Mail\ipChangeMail;

class AuthController extends Controller
{
    public function login_admin()
    {
        // dd(Hash::make('password'));
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1){
            return redirect('/admin_dashboard');
        }
        elseif(!empty(Auth::check()) && Auth::user()->is_admin == 0){
            return redirect('/home');
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 0, 'is_delete' => 0], $remember)){
            return redirect('/admin_dashboard');
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 0, 'status' => 0, 'is_delete' => 0], $remember)){
            return redirect('/home');
        }
        else{
            return redirect()->back()->with('error',"Please enter correct email and password");
        }
    }

    public function log_out(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
 
        return redirect('/');
    }

    public function auth_login(Request $request){
        $remember = !empty($request->is_remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 0, 'is_delete' => 0], $remember)){
            if(!empty(Auth::user()->email_verified_at)){
                $json['status'] = true;
                $json['message'] = 'success';
            }
            else{
                $user = User::getSingle(Auth::user()->id);
                Mail::to($user->email)->send(new RegisterMail($user));
                Auth::logout();
                $json['status'] = false;
                $html = 'Your account email is not verified. Please check your inbox and verify your account.';
                $json['html'] = $html;
            }

        }
        else{
            $json['status'] = false;
            $html = 'Please enter correct email and password';
            $json['html'] = $html;
        }
        echo json_encode($json);
    }

    public function forgot_password(Request $request){
        $data['meta_title'] = 'Forgot Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('auth.forgot', $data);
    }

    public function ipChange(Request $request){
        $data['meta_title'] = 'Initial Password Change';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('auth.initialPwChange', $data);
    }

    public function auth_forgot_password(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('succes', "Email has been sent successfully. Please check your inbox to change your password.");
        }
        else{
            return redirect()->back()->with('err', "Email not found in the system.");
        }
    }

    public function auth_ipChange(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ipChangeMail($user));
            return redirect()->back()->with('succes', "Email has been sent successfully. Please check your inbox to change your password.");
        }
        else{
            return redirect()->back()->with('err', "Email not found in the system.");
        }
    }

    public function reset($token){
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            $data['meta_title'] = 'Reset Password';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';
            return view('auth.reset', $data);
        }
        else{
            abort(404);
        }
    }

    public function authReset($token, Request $request){
        if($request->password == $request->cpassword){
            $user = User::where('remember_token', '=', $token)->first();
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();



            return redirect(url('/'))->with('success', "Password reset successful.");
        }
        else{
            return redirect()->back()->with('err', "Password and confirm password does not match");
        }
    }

    public function changePw($token){
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            $data['meta_title'] = 'Change Password';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';
            return view('auth.changePw', $data);
        }
        else{
            abort(404);
        }
    }

    public function authChangePw($token, Request $request){
        if($request->password == $request->cpassword){
            $user = User::where('remember_token', '=', $token)->first();
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();



            return redirect(url('/'))->with('success', "Password changed successful.");
        }
        else{
            return redirect()->back()->with('err', "Password and confirm password does not match");
        }
    }
}
