@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Admin List</h1>
        </div>
        <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('/admin_add')}}" class="btn btn-primary">Add New Admin</a>
        </div>
      </div>
    </div>
  </div>


  <form action="" method="GET">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Admin Search <span style="color: #D0342C;">(Record Found: {{ $getRecords instanceof \Illuminate\Pagination\LengthAwarePaginator ? $getRecords->total() : $getRecords->count() }})</span></h3>
            <div class="col-sm-6" style="text-align:right; float:right;">
              <a href="{{ url('/export_excel') }}" class="btn btn-success">Export to Excel</a>
            </div>
        </div>

        

        <div class="card-body">

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">User ID</label>
                        <input type="text" placeholder="User ID" name="user_id" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" placeholder="Name" name="name" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" placeholder="Email" name="email" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" placeholder="Phone" name="phone" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" placeholder="Address" name="address" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-2" style="margin-top: 30px;">
                    <button  class="btn btn-primary btn_edit"
                        style="width: 50px;"><i class="fas fa-search"></i></button>
                    <a href="{{url('/admin_list')}}" class="btn btn-danger btn_delete"
                        style="width: 50px;"><i class="fas fa-undo"></i></a>
                </div>
                
            </div>
        </div>
    </div>
</form>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Admin List</h3>
    </div>

    <div class="card-body p-0 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Address</th>
            <th>Status</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($getRecords as $value)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$value->user_number}}</td>
            <td>{{$value->name}} {{$value->last_name}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->phone}}</td>
            <td style="text-transform: capitalize;">{{$value->country}}</td>
            <td style="text-transform: capitalize;">{{$value->address}} {{$value->address_two}}</td>
            <td>
              @if ($value->status == 0)
              <span style="color: rgb(9, 116, 9)">Active</span>
              @endif
              @if ($value->status == 1)
              <span style="color: #D0342C">Inactive</span>
              @endif
            </td>
            <td style="text-align: center;">
              <a href="{{url('/admin_edit/'.$value->id)}}" class="btn btn-primary btn_edit" style="width: 50px;"><i
                  class="fas fa-edit"></i></a>
              <a onclick="confirmation(event)" href="{{url('/admin_delete/'.$value->id)}}"
                class="btn btn-danger btn_delete" style="width: 50px;"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div style="padding: 10px; float: right;">
        @if ($getRecords instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {!! $getRecords->appends(request()->except('page'))->links() !!}
        @endif
    </div>
    </div>
  </div>
</div>
@endsection

@section('script')


@endsection