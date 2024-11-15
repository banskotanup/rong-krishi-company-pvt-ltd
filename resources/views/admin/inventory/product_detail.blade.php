@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Inventory Product Details</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID: <span style="color: red;">{{$getRecords->id}}</span> </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Created Date: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->created_at}}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Product Name: <span style="font-weight: 500; color: #605e5e;">{{$getRecords->title}}
                                </span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Remaining Quantity: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->remaining_quantity}}
                                </span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status: <span style="font-weight: 500; color: #605e5e;">
                                    @if ($getRecords->remaining_quantity > 0)
                                    <span style="color: rgb(9, 116, 9)">Available</span>
                                    @else
                                    <span style="color: #D0342C">Out of Stock</span>
                                    @endif
                                </span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Inventory Details</h3>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Quantity In</th>
                            <th>Purchase Price (NPR)</th>
                            <th>Total Purchase Amount (NPR)</th>
                            <th>Quantity Out</th>
                            <th>Selling Price (NPR)</th>
                            <th>Total Selling Amount (NPR)</th>
                            <th>Total Gains (NPR)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$getRecords->purchase_quantity}}</td>
                            <td>{{number_format($getRecords->purchase_price, 2)}}</td>
                            <td>{{number_format($getRecords->total_purchase_amount, 2)}}</td>
                            <td>{{$getRecords->sold_quantity}}</td>
                            <td>{{number_format($getRecords->sold_price, 2)}}</td>
                            <td>{{number_format($getRecords->total_selling_amount, 2)}}</td>
                            <td>{{number_format($getRecords->total_selling_amount - $getRecords->total_purchase_amount, 2)}}</td>
                            <td>
                                @if ($getRecords->total_selling_amount > $getRecords->total_purchase_amount)
                                    <span style="color: rgb(9, 116, 9)">Profit</span>
                                @else
                                    <span style="color: #D0342C">Loss</span>
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection