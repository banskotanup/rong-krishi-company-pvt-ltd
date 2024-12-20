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
                                <form action="" method="post">
                                    {{csrf_field()}}
                                    
                                    <div class="form-group">
                                        <label for="register-email-2">Old Password <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control" name="old_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="register-email-2">New Password <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="register-email-2">Confirm Password <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control" name="cpassword" required>
                                    </div>
                                    <div class="form-footer">
                                        <button id="CheckPassword" type="submit" style="width: 200px; " class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Change Password</span>
                                            <span class="btn-hover-text">Change Your Password</span>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection

