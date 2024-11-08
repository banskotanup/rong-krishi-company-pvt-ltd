@extends('home.layouts.app')
@section('style')
<style>
    .box-btn {
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        border: 1px solid black;
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px, 3px, rgba(0, 0, 0, .2);

    }
</style>
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">My Account</li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    @include('user._sidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <h3 class="card-title" style="margin-bottom: 10px; margin-left: 20px;">Personal Details</h3>

                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">ID: <span
                                                            style="font-weight: 500;">{{$getRecords->id}}</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">User ID: <span
                                                            style="color: red;">{{$getRecords->user_number}}</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">Name: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->name}} {{$getRecords->last_name}}
                                                        </span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">User From: <span
                                                            >{{$getRecords->created_at}}</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">Phone: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->phone}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">Email: <span
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
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">Country: <span
                                                            style="text-transform: capitalize; font-weight: 500; color: #605e5e;">{{$getRecords->country}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">Address: <span
                                                            style="text-transform: capitalize; font-weight: 500; color: #605e5e;">{{$getRecords->address}}, {{$getRecords->address_two}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">City: <span
                                                            style="text-transform: capitalize; font-weight: 500; color: #605e5e;">{{$getRecords->city}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">Postcode: <span
                                                            style="font-weight: 500; color: #605e5e;">{{$getRecords->postcode}}</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">User Type: 
                                                            @if ($getRecords->is_admin == 0)
                                                            <span style="color: rgb(94, 94, 18); font-weight:500;">Member</span>
                                                            @endif
                                                            @if ($getRecords->is_admin == 1)
                                                            <span style="color: blue; font-weight:500;">Admin</span>
                                                            @endif
                                                        </label>

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label style="font-weight: 500;">Status: 
                                                        @if ($getRecords->status == 0)
                                                        <span style="color: green; font-weight:500;">Active</span>
                                                        @endif
                                                        @if ($getRecords->status == 1)
                                                        <span style="color: #D0342C; font-weight:500;">Inactive</span>
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <h3 class="card-title" style="margin-top: 20px; margin-bottom: 20px; margin-left: 20px;">
                                Order History</h3>
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-md-3">
                                                <div class="box-btn" style="margin-bottom: 20px;">
                                                    <div class="card-title" style="font-size: 16px;">{{$total_orders}}
                                                    </div>
                                                    <div style="font-size: 16px; font-weight: 500;">Total Order</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-bottom: 20px;">
                                                <div class="box-btn">
                                                    <div class="card-title" style="font-size: 16px;">{{$today_orders}}
                                                    </div>
                                                    <div style="font-size: 16px; font-weight: 500;">Today's Order</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-bottom: 20px;">
                                                <div class="box-btn">
                                                    <div class="card-title" style="font-size: 16px;">NPR
                                                        {{number_format($today_amount, 2)}}</div>
                                                    <div style="font-size: 16px; font-weight: 500;">Today's Amount'</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-bottom: 20px;">
                                                <div class="box-btn">
                                                    <div class="card-title" style="font-size: 16px;">NPR
                                                        {{number_format($total_amount, 2)}}</div>
                                                    <div style="font-size: 16px; font-weight: 500;">Total Amount</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-bottom: 20px;">
                                                <div class="box-btn">
                                                    <div class="card-title" style="font-size: 16px;">{{$total_pending}}
                                                    </div>
                                                    <div style="font-size: 16px; font-weight: 500;">Pending Order</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-bottom: 20px;">
                                                <div class="box-btn">
                                                    <div class="card-title" style="font-size: 16px;">
                                                        {{$total_inprogress}}</div>
                                                    <div style="font-size: 16px; font-weight: 500;">In Progress Order</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-bottom: 20px;">
                                                <div class="box-btn">
                                                    <div class="card-title" style="font-size: 16px;">
                                                        {{$total_completed}}</div>
                                                    <div style="font-size: 16px; font-weight: 500;">Completed Order</div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="margin-bottom: 20px;">
                                                <div class="box-btn">
                                                    <div class="card-title" style="font-size: 16px;">
                                                        {{$total_cancelled}}</div>
                                                    <div style="font-size: 16px; font-weight: 500;">Cancelled Order</div>
                                                </div>
                                            </div>
                                        </div><!-- .End .tab-pane -->
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>




                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection