@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Category List</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{url('/sub_category_add')}}" class="btn btn-primary">Add New Sub Category</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.auth.message')
    <form action="" method="GET">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sub Category Search <span style="color: #D0342C;">(Record Found: {{$getRecords->total()}})</span></h3>
            </div>
            <div class="card-body">
    
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input type="text" placeholder="Category Name" name="category_name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Sub Category Name</label>
                            <input type="text" placeholder="Sub Category Name" name="sub_category_name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">From Date</label>
                            <input type="date" style="padding: 6px;" name="from_date" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">To Date</label>
                            <input type="date" style="padding: 6px;" name="to_date" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-2" style="margin-top: 30px;">
                        <button  class="btn btn-primary btn_edit"
                            style="width: 50px;"><i class="fas fa-search"></i></button>
                        <a href="{{url('/sub_category_list')}}" class="btn btn-danger btn_delete"
                            style="width: 50px;"><i class="fas fa-undo"></i></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sub Category List</h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Slug</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keywords</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecords as $value)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$value->category_name}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->slug}}</td>
                        <td>{{$value->meta_title}}</td>
                        <td>{{$value->meta_description}}</td>
                        <td>{{$value->meta_keywords}}</td>
                        <td>{{$value->created_by_name}}</td>
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
                            <a href="{{url('/sub_category_edit/'.$value->id)}}" class="btn btn-primary btn_edit"
                                style="width: 50px;"><i class="fas fa-edit"></i></a>
                            <a onclick="confirmation(event)" href="{{url('/sub_category_delete/'.$value->id)}}" class="btn btn-danger btn_delete"
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

@section('script')
<script src="/admin/dist/js/pages/dashboard3.js"></script>
@endsection