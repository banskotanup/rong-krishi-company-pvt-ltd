@extends('home.layouts.app')
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Edit Profile</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">My Account</li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                            @include('admin.auth.message')
                            <form action="" method="post">
                                {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$getRecords->name}}">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{$getRecords->last_name}}">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                            <label>Email address </label>
                            <input type="email" name="email" class="form-control" value="{{$getRecords->email}}" readonly>

                            <label>Company Name (Optional)</label>
                            <input type="text" name="company_name" class="form-control" value="{{$getRecords->company_name}}">

                            <label>Country </label>
                            <input type="text" name="country" class="form-control" value="{{$getRecords->country}}">

                            <label>Street address </label>
                            <input type="text" name="address" class="form-control" placeholder="House number and Street name" value="{{$getRecords->address}}">
                            <input type="text" name="address_two" class="form-control" placeholder="Appartments, suite, unit etc ..." value="{{$getRecords->address_two}}"
                                >

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Town / City </label>
                                    <input type="text" name="city" class="form-control" value="{{$getRecords->city}}">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>State </label>
                                    <input type="text" name="state" class="form-control" value="{{$getRecords->state}}">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Postcode / ZIP </label>
                                    <input type="text" name="postcode" class="form-control" value="{{$getRecords->postcode}}">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label>Phone </label>
                                    <input type="tel" name="phone" class="form-control" value="{{$getRecords->phone}}">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <button type="submit" style="width: 100px; " class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Edit Profile</span>
                                    <span class="btn-hover-text">Proceed to Submit</span>
                                </button>

                            
                            </form>
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection

