<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Hash;
use App\Models\User;
use App\Models\ShippingCharge;

class ShippingChargeController extends Controller
{
    public function shipping_charge_list(){
        $data['getRecords'] = ShippingCharge::getRecord();
        $data['header_title'] = 'Shipping Charges';
        return view('admin.sc_pages.shipping_charge_list', $data)->with('no', 1);
    }

    public function shipping_charge_add(){
        $data['header_title'] = 'Shipping-Charge-Add';
        return view('admin.sc_pages.shipping_charge_add', $data);
    }

    public function insert_shipping_charge(Request $request){
        $ShippingCharge = new ShippingCharge;
        $ShippingCharge->name = trim($request->name);
        $ShippingCharge->price = trim($request->price);
        $ShippingCharge->status = trim($request->status);
        $ShippingCharge->save();
        return redirect('/shipping_charge_list')->with('success',"Shipping charge created  successfully!!!");
    }

    public function edit_shipping_charge($id){
        $data['getRecords'] = ShippingCharge::getSingle($id);
        $data['header_title'] = 'Shipping-Charge-Edit';
        return view('admin.sc_pages.shipping_charge_edit', $data);
    }

    public function update_edit_shipping_charge($id, Request $request){
        $ShippingCharge = ShippingCharge::getSingle($id);
        $ShippingCharge->name = trim($request->name);
        $ShippingCharge->price = trim($request->price);
        $ShippingCharge->status = trim($request->status);
        $ShippingCharge->save();
        return redirect('/shipping_charge_list')->with('success',"Shipping charge updated  successfully!!!");
    }

    public function delete_shipping_charge($id){
        $ShippingCharge = ShippingCharge::getSingle($id);
        $ShippingCharge->is_delete = 1;
        $ShippingCharge->save();
        return redirect('/shipping_charge_list')->with('success',"Shipping charge deleted  successfully!!!");
    }
}
