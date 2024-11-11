@extends('home.layouts.app')
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Change Password</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">My Account</li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                            <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                @include('admin.auth.message')
                                <div class="error-content text-center" style="background-image: url(assets/images/backgrounds/error-bg.jpg)">
                                    <div class="container">
                                        <h1 class="error-title">Account Not Verified</h1><!-- End .error-title -->
                                        <p>We are sorry, the page you've requested is not available.</p>
                                        <p>Please complete your profile details first, and try again!</p>
                                        <a href="{{url('/edit_profile')}}" class="btn btn-outline-primary-2 btn-minwidth-lg">
                                            <span>EDIT PROFILE</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .container -->
                                </div><!-- End .error-content text-center -->
                            </div>

                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
