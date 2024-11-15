<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\BlogModel;
use App\Models\Notification;
use Mail;
use App\Mail\RegisterMail;
use Str;

class NotificationController extends Controller
{
    public function index(){
        $data['getRecords'] = Notification::getNotification();
        $data['header_title'] = 'Notification';
        return view('admin.pages.notification', $data)->with('no', 1);
    }
}