@extends('home.layouts.app')
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">F.A.Q<span>Pages</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <h2 class="title text-center mb-3">Shipping Information</h2><!-- End .title -->
            <div class="accordion accordion-rounded" id="accordion-1">
                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading-1">
                        <h2 class="card-title">
                            <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                How will my parcel be delivered?
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-1">
                        <div class="card-body">
                            Your parcel will be delivered through local courier services that operate across Nepal, ensuring timely and secure delivery to your location. Depending on your area, delivery times may vary, but we strive to ensure all parcels reach you within a reasonable timeframe, even in rural or remote regions.
                            <br>
                                "This answer considers Nepal's diverse geography and local delivery infrastructure."
                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->

                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading-2">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                Do I pay for delivery?
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-1">
                        <div class="card-body">
                            Delivery charges may apply depending on your location and the size of your order. We offer free delivery for certain locations or on orders above a specified amount. Details will be provided during checkout.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->

                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading-3">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                Will I be charged customs fees?
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-1">
                        <div class="card-body">
                            For orders within Nepal, you won’t be charged customs fees. However, if you're placing an international order, customs duties or taxes may apply based on the destination country's regulations. Please check with local authorities for more information.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->

                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading-4">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                My item has become faulty
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-1">
                        <div class="card-body">
                            If your item has become faulty, please contact our customer support team immediately. We offer a replacement or refund depending on the nature of the fault and our return policy. Be sure to provide your order details and any relevant information for a quick resolution.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->
            </div><!-- End .accordion -->

            <h2 class="title text-center mb-3">Orders and Returns</h2><!-- End .title -->
            <div class="accordion accordion-rounded" id="accordion-2">
                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading2-1">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-1" aria-expanded="false" aria-controls="collapse2-1">
                                Tracking my order
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse2-1" class="collapse" aria-labelledby="heading2-1" data-parent="#accordion-2">
                        <div class="card-body">
                            You can easily track your order through the tracking link provided in your confirmation email. Simply enter the tracking number on our website or the courier's site to see real-time updates on your delivery status. If you encounter any issues, feel free to contact our support team for assistance.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->

                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading2-2">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-2" aria-expanded="false" aria-controls="collapse2-2">
                                I haven’t received my order
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse2-2" class="collapse" aria-labelledby="heading2-2" data-parent="#accordion-2">
                        <div class="card-body">
                            If you haven’t received your order within the expected delivery time, please check your tracking information for updates. If there’s no progress or you encounter issues, contact our customer support team with your order details, and we will assist you in resolving the matter as quickly as possible.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->

                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading2-3">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-3" aria-expanded="false" aria-controls="collapse2-3">
                                How can I return an item?
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse2-3" class="collapse" aria-labelledby="heading2-3" data-parent="#accordion-2">
                        <div class="card-body">
                            To return an item, please contact our customer support team to initiate the process. We will guide you through our return policy, including eligibility, packaging instructions, and the return shipping process. Once the item is received and inspected, we will process a refund or replacement as per your preference.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->
            </div><!-- End .accordion -->

            <h2 class="title text-center mb-3">Payments</h2><!-- End .title -->
            <div class="accordion accordion-rounded" id="accordion-3">
                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading3-1">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-1" aria-expanded="false" aria-controls="collapse3-1">
                                What payment types can I use?
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse3-1" class="collapse" aria-labelledby="heading3-1" data-parent="#accordion-3">
                        <div class="card-body">
                            We accept various payment methods, including cash on delivery (COD), major credit and debit cards, bank transfers, and popular mobile payment platforms in Nepal like eSewa and Khalti. Choose the option that’s most convenient for you during checkout.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->

                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading3-2">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-2" aria-expanded="false" aria-controls="collapse3-2">
                                Can I pay by Gift Card?
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse3-2" class="collapse" aria-labelledby="heading3-2" data-parent="#accordion-3">
                        <div class="card-body">
                            Currently, we do not accept gift cards as a payment method. However, you can choose from our available payment options, including cash on delivery, credit and debit cards, and mobile payment platforms during checkout.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->

                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading3-3">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-3" aria-expanded="false" aria-controls="collapse3-3">
                                I can't make a payment
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse3-3" class="collapse" aria-labelledby="heading3-3" data-parent="#accordion-3">
                        <div class="card-body">
                            If you're having trouble making a payment, please check your internet connection and ensure that your payment details are entered correctly. If the issue persists, try using a different payment method or contact our customer support team for assistance. We're here to help you resolve any payment issues quickly.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->

                <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading3-4">
                        <h2 class="card-title">
                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-4" aria-expanded="false" aria-controls="collapse3-4">
                                Has my payment gone through?
                            </a>
                        </h2>
                    </div><!-- End .card-header -->
                    <div id="collapse3-4" class="collapse" aria-labelledby="heading3-4" data-parent="#accordion-3">
                        <div class="card-body">
                            To confirm if your payment has gone through, please check your email for a confirmation message or receipt. If you don’t see it, verify your bank or payment method statement for any transaction record. If you're still unsure, please contact our customer support team with your order details, and we’ll assist you in checking the payment status.                        </div><!-- End .card-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .card -->
            </div><!-- End .accordion -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

    <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url(assets/images/backgrounds/cta/bg-6.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-7">
                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                        <div class="col">
                            <h3 class="cta-title text-white">If You Have More Questions</h3><!-- End .cta-title -->
                        </div>
                    </div><!-- End .row no-gutters -->
                    <div style="margin-top: 20px;">
                        <a href="{{url('/contact_us')}}" class="btn btn-outline-white"><span>CONTACT US</span><i class="icon-long-arrow-right"></i></a>
                    </div>
                </div><!-- End .col-md-10 col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->
</main><!-- End .main -->

@endsection