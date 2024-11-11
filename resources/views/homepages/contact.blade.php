@extends('home.layouts.app')
@section('content')

<main class="main">
                <div style="padding-top: 10px;padding-bottom: 10px;">
                @include('admin.auth.message')
                </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center"
            style="background-image: url('assets/images/contact-header-bg.jpg')">
            <h1 class="page-title text-white">Contact us<span class="text-white">keep in touch with us</span></h1>
        </div><!-- End .page-header
    </div><!-- End .container -->


    @php
    $getSystemSettingApp = App\Models\SystemSetting::getSingle();
    @endphp

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                    <p class="mb-3">Get in touch with us for any inquiries, support, or partnership opportunities. Our
                        team at Rong Krishi is here to assist you with all your agricultural needs. Reach out to us
                        through the following contact details, and we’ll be happy to help!</p>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="contact-info">
                                <h3>The Office</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-map-marker"></i>
                                        {{$getSystemSettingApp->office_address}}
                                    </li>
                                    <li>
                                        <i class="icon-phone"></i>
                                        <a href="tel:#">+977 {{$getSystemSettingApp->phone_one}}, {{$getSystemSettingApp->phone_two}}</a>
                                    </li>
                                    <li>
                                        <i class="icon-envelope"></i>
                                        <a href="mailto:#">{{$getSystemSettingApp->email_one}}</a>
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-7 -->

                        <div class="col-sm-5">
                            <div class="contact-info">
                                <h3>The Office</h3>

                                <ul class="contact-list">
                                    <li>
                                        <i class="icon-clock-o"></i>
                                        <span class="text-dark">Sunday-Thursday</span> <br>10am-5pm
                                    </li>
                                    <li>
                                        <i class="icon-calendar"></i>
                                        <span class="text-dark">Friday</span> <br>10am-3pm
                                    </li>
                                </ul><!-- End .contact-list -->
                            </div><!-- End .contact-info -->
                        </div><!-- End .col-sm-5 -->
                    </div><!-- End .row -->
                </div><!-- End .col-lg-6 -->
                <div class="col-lg-6">
                
                    <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                    <p class="mb-2">Use the form below to get in touch with the sales team</p>

               
                    <form action="" class="contact-form mb-3" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cname" class="sr-only">Name</label>
                                <input type="text" class="form-control" name="name" id="cname" placeholder="Name *" required>
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label for="cemail" class="sr-only">Email</label>
                                <input type="email" class="form-control" name="email" id="cemail" placeholder="Email *" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="cphone" class="sr-only">Phone</label>
                                <input type="tel" class="form-control" name="phone" id="cphone" placeholder="Phone">
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label for="csubject" class="sr-only">Subject</label>
                                <input type="text" class="form-control" name="subject" id="csubject" placeholder="Subject" required>
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label for="cmessage" class="sr-only">Message</label>
                        <textarea class="form-control" cols="30" rows="4" name="message" id="cmessage" required placeholder="Message *"></textarea>

                        <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                            <span>SUBMIT</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </form><!-- End .contact-form -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <hr class="mt-4 mb-5">

            <div class="stores mb-4 mb-lg-5">
                <h2 class="title text-center mb-3">Our Stores</h2><!-- End .title text-center mb-2 -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="store">
                            <div class="row">
                                <div class="col-sm-5 col-xl-6">
                                    <figure class="store-media mb-2 mb-lg-0">
                                        <img src="{{$getSystemSettingApp->getStoreImage()}}" alt="image">
                                    </figure><!-- End .store-media -->
                                </div><!-- End .col-xl-6 -->
                                <div class="col-sm-7 col-xl-6">
                                    <div class="store-content">
                                        <h3 class="store-title">{{$getSystemSettingApp->store_address_name}}</h3><!-- End .store-title -->
                                        <address>{{$getSystemSettingApp->office_address}}</address>
                                        <div><a href="tel:#">+977 {{$getSystemSettingApp->phone_one}}</a></div>
                                    </div><!-- End .store-content -->
                                </div><!-- End .col-xl-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .store -->
                    </div><!-- End .col-lg-6 -->


                </div><!-- End .row -->
            </div><!-- End .stores -->
        </div><!-- End .container -->
        <div id="map">
            <iframe
                src="{{$getSystemSettingApp->location_url}}"
                width="600" height="430" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
        </div><!-- End #map -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection