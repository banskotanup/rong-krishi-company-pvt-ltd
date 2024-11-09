<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSetting;
use Str;

class PageController extends Controller
{
    public function index(){
        $data['getRecords'] = SystemSetting::getSingle();
        $data['header_title'] = "System Setting";
        return view('admin.pages.system_setting', $data);
    }

    public function update_system_settings(Request $request){
        $save = SystemSetting::getSingle();
        $save->website_name = trim($request->website_name);
        $save->office_address = trim($request->office_address);
        $save->email_one = trim($request->email_one);
        $save->email_two = trim($request->email_two);
        $save->phone_one = trim($request->phone_two);
        $save->phone_two = trim($request->phone_two);
        $save->footer_description = trim($request->footer_description);
        $save->facebook_link = trim($request->facebook_link);
        $save->twitter_link = trim($request->twitter_link);
        $save->instagram_link = trim($request->instagram_link);
        $save->youtube_link = trim($request->youtube_link);
        $save->pinterest_link = trim($request->pinterest_link);
        

        if(!empty($request->file('logo'))){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->logo = trim($filename);
        }
        if(!empty($request->file('fevicon'))){
            $file = $request->file('fevicon');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->fevicon = trim($filename);
        }
        if(!empty($request->file('footer_payment_icon'))){
            $file = $request->file('footer_payment_icon');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->footer_payment_icon = trim($filename);
        }
        if(!empty($request->file('store_image'))){
            $file = $request->file('store_image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->store_image = trim($filename);
        }

        $save->save();
        return redirect('/system_setting')->with('success', 'System Settings Successfully Updated!!!');
    }
}
