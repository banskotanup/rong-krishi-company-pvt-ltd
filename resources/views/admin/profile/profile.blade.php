@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">My Account</h1>
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
                        <label>ID: <span>{{$getRecords->id}}</span> </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>User ID: <span style="color: red;">{{$getRecords->user_number}}</span> </label>
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
                                style="font-weight: 500; color: #605e5e;">{{$getRecords->address}},
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

</div>
@endsection

@section('script')


@endsection