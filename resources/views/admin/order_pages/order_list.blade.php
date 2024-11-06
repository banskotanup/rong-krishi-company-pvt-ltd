@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders List</h1>
                </div>
            </div>
        </div>
    </div>

    @include('admin.auth.message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Orders List</h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Country</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Discount Code</th>
                        <th>Discount Amount(NPR)</th>
                        <th>Shipping Amount(NPR)</th>
                        <th>Total Amount(NPR)</th>
                        <th>Payment Method</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecords as $value)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$value->first_name}} {{$value->last_name}}</td>
                        <td>{{$value->company_name}}</td>
                        <td>{{$value->country}}</td>
                        <td>{{$value->address_one}} <br/> {{$value->address_two}}</td>
                        <td>{{$value->city}}</td>
                        <td>{{$value->state}}</td>
                        <td>{{$value->postcode}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->discount_code}}</td>
                        <td>{{number_format($value->discount_amount, 2)}}</td>
                        <td>{{number_format($value->shipping_amount, 2)}}</td>
                        <td>{{number_format($value->total_amount, 2)}}</td>
                        <td style="text-transform: capitalize;">{{$value->payment_method}}</td>
                        <td>{{date('d-m-y', strtotime($value->created_at))}}</td>
                        <td>
                            @if ($value->status == 0)
                            <span style="color: rgb(8, 165, 8)">Active</span>
                            @endif
                            @if ($value->status == 1)
                            <span style="color: #D0342C">Inactive</span>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a href="{{url('/order_view/'.$value->id)}}" class="btn btn-primary">Details</a>
                            {{-- <a onclick="confirmation(event)" href="{{url('/category_delete/'.$value->id)}}" class="btn btn-danger btn_delete"
                                style="width: 50px;"><i class="fas fa-trash"></i></a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding: 10px; float: right;">
                {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection