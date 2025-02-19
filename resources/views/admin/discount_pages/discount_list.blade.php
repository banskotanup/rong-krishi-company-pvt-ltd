@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Discount Code List</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{url('/discount_add')}}" class="btn btn-primary">Add Discount Code</a>
                </div>
            </div>
        </div>
    </div>

    @include('admin.auth.message')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Discount Code List</h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Percent / Amount</th>
                        <th>Expire Date</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecords as $value)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->type}}</td>
                        <td>{{$value->percent_amount}}</td>
                        <td>{{date('d-m-y', strtotime($value->expire_date))}}</td>

                        <td>
                            @if ($value->status == 0)
                            <span style="color: rgb(8, 165, 8)">Active</span>
                            @endif
                            @if ($value->status == 1)
                            <span style="color: #D0342C">Inactive</span>
                            @endif
                        </td>
                        <td>{{date('d-m-y', strtotime($value->created_at))}}</td>
                        <td style="text-align: center;">
                            <a href="{{url('/discount_edit/'.$value->id)}}" class="btn btn-primary btn_edit"
                                style="width: 50px;"><i class="fas fa-edit"></i></a>
                            <a onclick="confirmation(event)" href="{{url('/discount_delete/'.$value->id)}}" class="btn btn-danger btn_delete"
                                style="width: 50px;"><i class="fas fa-trash"></i></a>
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
