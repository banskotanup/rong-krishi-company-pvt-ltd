@extends('home.layouts.app')
@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    @php
    $getAboutUs = App\Models\AboutUs::getSingle();
    @endphp
    <div class="container">
        <div class="page-header page-header-big text-center"
            style="background-image: url('assets/images/about-header-bg.jpg')">
            <h1 class="page-title text-white">About us<span class="text-white">Who we are</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <h2 class="title">Our Vision</h2><!-- End .title -->
                    <p style="text-align: justify">{!! $getAboutUs->our_vision !!}</p>
                </div><!-- End .col-lg-6 -->

                <div class="col-lg-6">
                    <h2 class="title">Our Mission</h2><!-- End .title -->
                    <p style="text-align: justify">{!! $getAboutUs->our_mission !!}</p>
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <div class="mb-5"></div><!-- End .mb-4 -->
        </div><!-- End .container -->

        <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <h2 class="title">Who We Are?</h2><!-- End .title -->
                        <p style="font-weight: 510px; font-size:18px; color:black;">Empowering Agriculture, <span
                                style="color: green; font-family:'Barcelony Signature'; font-size:20px;">Enriching
                                Lives</span></p><!-- End .lead text-primary -->
                        <p class="mb-2" style="text-align: justify;">{!! $getAboutUs->who_we_are !!}</p>

                        <a style="margin-top: 10px;" href="{{url('/blog')}}" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                            <span>VIEW OUR BLOGS</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-5 -->

                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-images">
                            <img src="{{$getAboutUs->getImage()}}" alt="" class="about-img-front">
                        </div><!-- End .about-images -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h2 class="title" style="text-align: center; ">The Destination for Fresh, Premium Agricultural
                            Products.<span style="color: green; font-family:'Barcelony Signature';"> Bringing Together
                                the Best!</span></h2>
                    </div><!-- End .brands-text -->
                </div>
            </div><!-- End .row -->

            <hr class="mt-4 mb-6">

            @php
            $getTeam = App\Models\OurTeam::getTeam();
            @endphp

            <h2 class="title text-center mb-4">Meet Our Team</h2><!-- End .title text-center mb-2 -->

            <div class="row">
                @foreach($getTeam as $value)
                @php
                    $getImage = $value->getImageSingle($value->id);
                @endphp
                <div class="col-md-4">
                    <div class="member member-anim text-center">

                        <figure class="member-media">
                            @if(!empty($getImage) && !empty($getImage->getImage()))
                            <img style="height: 400px; width: 100%;" src="{{$getImage->getImage()}}" alt="member photo">
                            @endif
                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">{{$value->first_name}} {{$value->last_name}}</h3><!-- End .member-title -->
                                    <div class="social-icons social-icons-simple">
                                        <a href="{{$value->facebook_link}}" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="{{$value->whatsapp_number}}" class="social-icon" title="Whatsapp" target="_blank"><i
                                                class="icon-whatsapp"></i></a>
                                        <a href="{{$value->email}}" class="social-icon" title="Email" target="_blank"><i
                                                class="icon-envelope"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">{{$value->first_name}} {{$value->last_name}}</h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->
                @endforeach
        </div>

        <div class="mb-2"></div><!-- End .mb-2 -->

        {{-- <div class="about-testimonials bg-light-2 pt-6 pb-6">
            <div class="container">
                <h2 class="title text-center mb-3">What Customer Say About Us</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple owl-testimonials-photo" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "1200": {
                                "nav": true
                            }
                        }
                    }'>
                    <blockquote class="testimonial text-center">
                        <img src="assets/images/testimonials/user-1.jpg" alt="user">
                        <p>“ Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque aliquet nibh nec
                            urna. <br>In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula
                            sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh.
                            Nullam mollis. Ut justo. Suspendisse potenti. ”</p>
                        <cite>
                            Jenson Gregory
                            <span>Customer</span>
                        </cite>
                    </blockquote><!-- End .testimonial -->

                    <blockquote class="testimonial text-center">
                        <img src="assets/images/testimonials/user-2.jpg" alt="user">
                        <p>“ Impedit, ratione sequi, sunt incidunt magnam et. Delectus obcaecati optio eius error libero
                            perferendis nesciunt atque dolores magni recusandae! Doloremque quidem error eum quis
                            similique doloribus natus qui ut ipsum.Velit quos ipsa exercitationem, vel unde obcaecati
                            impedit eveniet non. ”</p>

                        <cite>
                            Victoria Ventura
                            <span>Customer</span>
                        </cite>
                    </blockquote><!-- End .testimonial -->
                </div><!-- End .testimonials-slider owl-carousel -->
            </div><!-- End .container -->
        </div> --}}
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection