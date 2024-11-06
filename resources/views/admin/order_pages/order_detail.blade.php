@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Order Details</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ID: <span>{{$getRecords->id}}</span> </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name: <span style="font-weight: 500; color: #605e5e;">{{$getRecords->first_name}}
                                    {{$getRecords->last_name}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Name: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->company_name}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->country}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->address_one}},
                                    {{$getRecords->address_two}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->city}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->state}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Postcode: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->postcode}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->phone}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->email}}</span></label>
                        </div>
                    </div>
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
                            <label>Discount Code: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->discount_code}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Discount Amount: <span style="font-weight: 500; color: #605e5e;">NPR
                                    {{number_format($getRecords->discount_amount, 2)}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Shipping Name: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->getShipping->name}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Shipping Amount: <span style="font-weight: 500; color: #605e5e;">NPR
                                    {{number_format($getRecords->shipping_amount, 2)}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Payable Amount: NPR <span style="text-decoration-line: underline; text-decoration-style: double;">{{number_format($getRecords->total_amount,
                                    2)}}</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Created Date: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->created_at}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-12" style="overflow:auto;">
                        <div class="form-group">
                            <label>Transaction ID: <span
                                    style="font-weight: 500; color: #605e5e;">{{$getRecords->transaction_id}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Payment Method: <span
                                    style="text-transform: capitalize; color:#c08f07">{{$getRecords->payment_method}}</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status:
                                @if ($getRecords->status == 0)
                                <span style="color: rgb(8, 165, 8)">Active</span>
                                @endif
                                @if ($getRecords->status == 1)
                                <span style="color: #D0342C">Inactive</span>
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Details</h3>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price (NPR)</th>
                            <th>Total Balance (NPR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getRecords->getItem as $item)
                        @php
                        $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id);
                        @endphp
                        <tr>
                            <td>{{$no++}}</td>
                            <td>
                                <img style="width: 100px; height:100px;" src="{{$getProductImage->getImage()}}" alt="">
                            </td>
                            <td>{{$item->getProduct->title}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{number_format($item->price, 2)}}</td>
                            <td>{{number_format($item->price * $item->qty, 2)}}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                {{-- <div style="padding: 10px; float: right;">
                    {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-bottom:1px;">
        <div class="card card-primary" >
            <div class="card-body" >
                <div class="row" >
                    <div class="col-md-12">
                        <div class="form-group" style="text-align: end; margin-right:50px;">
                            <label>Grand Total: NPR 
                                <span style="text-decoration-line: underline; text-decoration-style: double;">
                                    {{number_format($getRecords->total_balance,
                                        2)}}
                                </span>
                            </label>
                        </div>
                        <p style="text-align: center; color:gray;">"This is the total amounts for the products only. The final price may vary after applying discounts and shipping charges."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection