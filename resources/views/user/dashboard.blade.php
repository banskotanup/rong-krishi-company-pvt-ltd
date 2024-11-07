@extends('home.layouts.app')
@section('style')
<style>
    .box-btn{
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        border: 1px solid black;
        box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px, 3px, rgba(0,0,0,.2);

    }
</style>
@endsection
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="box-btn" style="margin-bottom: 20px;">
                                        <div style="font-size: 20px; font-weight: bold;">{{$total_orders}}</div>
                                        <div style="font-size: 16px;">Total Order</div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px; font-weight: bold;">{{$today_orders}}</div>
                                        <div style="font-size: 16px;">Today's Order</div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px; font-weight: bold;">NPR {{number_format($today_amount, 2)}}</div>
                                        <div style="font-size: 16px;">Today's Amount'</div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px; font-weight: bold;">NPR {{number_format($total_amount, 2)}}</div>
                                        <div style="font-size: 16px;">Total Amount</div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px; font-weight: bold;">{{$total_pending}}</div>
                                        <div style="font-size: 16px;">Pending Order</div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px; font-weight: bold;">{{$total_inprogress}}</div>
                                        <div style="font-size: 16px;">In Progress Order</div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px; font-weight: bold;">{{$total_completed}}</div>
                                        <div style="font-size: 16px;">Completed Order</div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="box-btn">
                                        <div style="font-size: 20px; font-weight: bold;">{{$total_cancelled}}</div>
                                        <div style="font-size: 16px;">Cancelled Order</div>
                                    </div>
                                </div>
                            </div><!-- .End .tab-pane -->

                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
