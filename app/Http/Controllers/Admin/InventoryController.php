<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function inventory(){
        $data['header_title'] = "Our Inventory";
        $data['getRecords'] = Inventory::getRecord();
        return view('admin.inventory.dashboard', $data)->with('no', 1);
    }
}
