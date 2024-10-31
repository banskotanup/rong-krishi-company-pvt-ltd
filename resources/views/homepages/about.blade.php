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
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('assets/images/about-header-bg.jpg')">
            <h1 class="page-title text-white">About us<span class="text-white">Who we are</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <h2 class="title">Our Vision</h2><!-- End .title -->
                    <p style="text-align: justify">At Rong Krishi, our vision is to transform the agricultural landscape by fostering sustainable practices that empower farmers and enrich communities. We aim to provide fresh, healthy, and high-quality produce while promoting innovation and modern techniques in farming. Through our commitment to environmental stewardship and community engagement, we aspire to create a thriving ecosystem that supports local farmers, enhances food security, and contributes to a healthier, more sustainable future for all.</p>
                </div><!-- End .col-lg-6 -->
                
                <div class="col-lg-6">
                    <h2 class="title">Our Mission</h2><!-- End .title -->
                    <p style="text-align: justify">Our mission at Rong Krishi is to empower farmers by providing them with innovative solutions, high-quality resources, and sustainable practices that enhance productivity and profitability. We are dedicated to delivering fresh, healthy produce to our customers while promoting environmental stewardship and community welfare. Through education, collaboration, and a commitment to excellence, we strive to be a leading force in the agricultural sector, ensuring a sustainable future for generations to come.</p>
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <div class="mb-5"></div><!-- End .mb-4 -->
        </div><!-- End .container -->

        <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <h2 class="title">Who We Are?</h2><!-- End .title -->
                        <p style="font-weight: 510px; font-size:18px; color:black;">Empowering Agriculture, <span style="color: green; font-family:'Barcelony Signature'; font-size:20px;">Enriching Lives</span></p><!-- End .lead text-primary -->
                        <p class="mb-2">At Rong Krishi, we are a dedicated team of agricultural enthusiasts committed to revolutionizing the farming landscape. With a focus on sustainability, innovation, and community empowerment, we strive to provide farmers with the tools and knowledge they need to thrive. Our passion for fresh, healthy produce drives us to connect local farmers with consumers, ensuring that quality food is accessible to all. Through our efforts, we aim to create a positive impact on the agricultural sector and foster a healthier environment for future generations.</p>

                        <a href="{{url('/blog')}}" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                            <span>VIEW OUR BLOGS</span>
                            <i class="icon-long-arrow-right"></i>
                        </a>
                    </div><!-- End .col-lg-5 -->

                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-images">
                            <img src="assets/images/about/img-1.jpg" alt="" class="about-img-front">
                        </div><!-- End .about-images -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h2 class="title" style="text-align: center; ">The Destination for Fresh, Premium Agricultural Products.<span style="color: green; font-family:'Barcelony Signature';"> Bringing Together the Best!</span></h2>
                    </div><!-- End .brands-text -->
                </div>
            </div><!-- End .row -->

            <hr class="mt-4 mb-6">

            <h2 class="title text-center mb-4">Meet Our Team</h2><!-- End .title text-center mb-2 -->

            <div class="row">
                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img style="height: 500px;" src="assets/images/team/member-1.jpg" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Narayan Luitel</h3><!-- End .member-title -->
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Whatsapp" target="_blank"><i class="icon-whatsapp"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Narayan Luitel</h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img style="height: 500px;" src="assets/images/team/member-2.jpg" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Anjana Sapkota</h3><!-- End .member-title -->
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Whatsapp" target="_blank"><i class="icon-whatsapp"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Anjana Sapkota</h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img style="height: 500px;" src="assets/images/team/member-3.jpg" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Chandra Prasad Luitel</h3><!-- End .member-title -->
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Whatsapp" target="_blank"><i class="icon-whatsapp"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Chandra Prasad Luitel</h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img style="height: 500px;" src="assets/images/team/member-4.jpg" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Dhruba Banskota</h3><!-- End .member-title -->
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Whatsapp" target="_blank"><i class="icon-whatsapp"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Dhruba Banskota</h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img style="height: 500px;" src="assets/images/team/member-2.jpg" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Alisha Aryal</h3><!-- End .member-title -->
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Whatsapp" target="_blank"><i class="icon-whatsapp"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Alisha Aryal</h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="member member-anim text-center">
                        <figure class="member-media">
                            <img style="height: 500px;" src="assets/images/team/member-3.jpg" alt="member photo">

                            <figcaption class="member-overlay">
                                <div class="member-overlay-content">
                                    <h3 class="member-title">Pawan Basnet</h3><!-- End .member-title -->
                                    <div class="social-icons social-icons-simple">
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Whatsapp" target="_blank"><i class="icon-whatsapp"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .member-overlay-content -->
                            </figcaption><!-- End .member-overlay -->
                        </figure><!-- End .member-media -->
                        <div class="member-content">
                            <h3 class="member-title">Pawan Basnet</h3><!-- End .member-title -->
                        </div><!-- End .member-content -->
                    </div><!-- End .member -->
                </div><!-- End .col-md-4 -->
            </div>
        </div>

        <div class="mb-2"></div><!-- End .mb-2 -->

        <div class="about-testimonials bg-light-2 pt-6 pb-6">
            <div class="container">
                <h2 class="title text-center mb-3">What Customer Say About Us</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple owl-testimonials-photo" data-toggle="owl" 
                    data-owl-options='{
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
                        <p>“ Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque aliquet nibh nec urna. <br>In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. ”</p>
                        <cite>
                            Jenson Gregory
                            <span>Customer</span>
                        </cite>
                    </blockquote><!-- End .testimonial -->

                    <blockquote class="testimonial text-center">
                        <img src="assets/images/testimonials/user-2.jpg" alt="user">
                        <p>“ Impedit, ratione sequi, sunt incidunt magnam et. Delectus obcaecati optio eius error libero perferendis nesciunt atque dolores magni recusandae! Doloremque quidem error eum quis similique doloribus natus qui ut ipsum.Velit quos ipsa exercitationem, vel unde obcaecati impedit eveniet non. ”</p>

                        <cite>
                            Victoria Ventura
                            <span>Customer</span>
                        </cite>
                    </blockquote><!-- End .testimonial -->
                </div><!-- End .testimonials-slider owl-carousel -->
            </div><!-- End .container -->
        </div>
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection