<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\AboutUs;
use App\Models\OurTeam;
use Str;
use App\Models\TeamImageModel;

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
        $save->store_address_name = trim($request->store_address_name);
        $save->location_url = trim($request->location_url);
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
        $save->slogan1 = trim($request->slogan1);
        $save->slogan2 = trim($request->slogan2);
        $save->slogan3 = trim($request->slogan3);
        $save->slogan4 = trim($request->slogan4);
        $save->slogan5 = trim($request->slogan5);
        

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
        if(!empty($request->file('banner1'))){
            $file = $request->file('banner1');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->banner1 = trim($filename);
        }
        if(!empty($request->file('banner2'))){
            $file = $request->file('banner2');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->banner2 = trim($filename);
        }
        if(!empty($request->file('banner3'))){
            $file = $request->file('banner3');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->banner3 = trim($filename);
        }
        if(!empty($request->file('banner4'))){
            $file = $request->file('banner4');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->banner4 = trim($filename);
        }
        if(!empty($request->file('banner5'))){
            $file = $request->file('banner5');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->banner5 = trim($filename);
        }
        if(!empty($request->file('banner1_1'))){
            $file = $request->file('banner1_1');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->banner1_1 = trim($filename);
        }
        if(!empty($request->file('banner2_1'))){
            $file = $request->file('banner2_1');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->banner2_1 = trim($filename);
        }
        if(!empty($request->file('banner3_1'))){
            $file = $request->file('banner3_1');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/', $filename);

            $save->banner3_1 = trim($filename);
        }

        $save->save();
        return redirect('/system_setting');
    }

    public function aboutus(){
        $data['getRecords'] = AboutUs::getSingle();
        $data['header_title'] = "About Us";
        return view('admin.pages.aboutus', $data);
    }

    public function update_about_us(Request $request){
        $save = AboutUs::getSingle();
        $save->intro = trim($request->intro);
        $save->our_vision = trim($request->our_vision);
        $save->our_mission = trim($request->our_mission);
        $save->who_we_are = trim($request->who_we_are);
        if(!empty($request->file('about_us_image'))){
            $file = $request->file('about_us_image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/about_us/', $filename);

            $save->about_us_image = trim($filename);
        }
        $save->save();
        return redirect('/aboutus');
    }


    public function our_team(){
        $data['getRecords'] = OurTeam::getTeam();
        $data['header_title'] = "Our Team";
        return view('admin.pages.our_team', $data)->with('no', 1);
    }

    public function add_team_member(){
        $data['header_title'] = 'Add-Team-Member';
        return view('admin.pages.add_team', $data);
    }

    public function insert_team_member(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        $user = new OurTeam;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->whatsapp_number = $request->whatsapp_number;
        $user->facebook_link = $request->facebook_link;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->postcode = $request->postcode;
        $user->status = $request->status;
        $user->save();
        if(!empty($request->file('profile_picture'))){
            $file = $request->file('profile_picture');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/our_team/', $filename);


            $imageupload  = new TeamImageModel;
            $imageupload->image_name = $filename; 
            $imageupload->user_id = $user->id;
            $imageupload->save(); 
        }

        return redirect('/our_team');
    }

    
    public function edit_team_member($id){
        $team = OurTeam::getSingle($id);
        if(!empty($team)){
            $data['getRecords'] = $team;
            $data['header_title'] = 'Team-Edit';
            return view('admin.pages.team_edit', $data);
        }
    }


    public function update_edit_team_member($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = OurTeam::getSingle($id);
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->whatsapp_number = $request->whatsapp_number;
        $user->facebook_link = $request->facebook_link;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->postcode = $request->postcode;
        $user->status = $request->status;
        $user->save();
        
        if(!empty($request->file('profile_picture'))){
            $file = $request->file('profile_picture');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/our_team/', $filename);

            $imageupload  = TeamImageModel::getSingle($id);
            $imageupload->image_name = $filename; 
            $imageupload->user_id = $user->id;
            $imageupload->save(); 
        }
        
        return redirect('/our_team');
    }

    public function our_team_delete($id){
        $user = OurTeam::getSingle($id);
        $user->is_deleted = 1;
        $user->save();
        return redirect('/our_team');
    }
    
}
