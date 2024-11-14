@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Contact Us</h1>
        </div>
      </div>
    </div>
  </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Contact- Message <span style="color: #D0342C;">(Total Message: {{$getRecords->total()}})</span></h3>
        </div>
    </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Message Info</h3>
    </div>

    <div class="card-body p-0 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Message</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($getRecords as $value)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$value->first_name}} {{$value->last_name}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->phone}}</td>
            <td style="text-transform: capitalize;">{{$value->subject}}</td>
            <td >{{$value->message}}</td>
            <td style="text-align: center;">
              <a onclick="confirmation(event)" href="{{url('/contact_us_delete/'.$value->id)}}"
                class="btn btn-danger btn_delete" style="width: 50px;"><i class="fas fa-trash"></i></a>
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