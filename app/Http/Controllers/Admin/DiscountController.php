<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\DiscountCode;

class DiscountController extends Controller
{
    public function discount_list(){
        $data['getRecords'] = DiscountCode::getRecord();
        $data['header_title'] = 'Discount Codes';
        return view('admin.discount_pages.discount_list', $data)->with('no', 1);
    }

    public function discount_add(){
        $data['header_title'] = 'Discount-Code-Add';
        return view('admin.discount_pages.discount_add', $data);
    }

    public function insert_discount(Request $request){
        $DiscountCode = new DiscountCode;
        $DiscountCode->name = trim($request->name);
        $DiscountCode->type = trim($request->type);
        $DiscountCode->percent_amount = trim($request->percent_amount);
        $DiscountCode->expire_date = trim($request->expire_date);
        $DiscountCode->status = trim($request->status);
        $DiscountCode->save();
        return redirect('/discount_list')->with('success',"Discount code created  successfully!!!");
    }

    public function edit_discount($id){
        $data['getRecords'] = DiscountCode::getSingle($id);
        $data['header_title'] = 'Discount-Code-Edit';
        return view('admin.discount_pages.discount_edit', $data);
    }

    public function update_edit_discount($id, Request $request){
        $DiscountCode = DiscountCode::getSingle($id);
        $DiscountCode->name = trim($request->name);
        $DiscountCode->type = trim($request->type);
        $DiscountCode->percent_amount = trim($request->percent_amount);
        $DiscountCode->expire_date = trim($request->expire_date);
        $DiscountCode->status = trim($request->status);
        $DiscountCode->save();
        return redirect('/discount_list')->with('success',"Discount code updated  successfully!!!");
    }

    public function delete_discount($id){
        $DiscountCode = DiscountCode::getSingle($id);
        $DiscountCode->is_delete = 1;
        $DiscountCode->save();
        return redirect('/discount_list')->with('success',"Discount code deleted  successfully!!!");
    }
}
