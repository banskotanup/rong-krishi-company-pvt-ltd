@extends('home.layouts.app')
@section('content')
@include('home.loader.loader')
<main class="main">
    <div style="text-align: center;">
        @include('admin.auth.message')
    </div>
    @php
    $getAboutUs = App\Models\AboutUs::getSingle();
    @endphp
    @php
    $getSystemSettingApp = App\Models\SystemSetting::getSingle();
    @endphp
    @include('sweetalert::alert')
    <div class="intro-section bg-lighter pt-5 pb-6">
        <h3 style="font-family: 'Barcelony Signature'; margin-top:10px;" class="cursor typewriter-animation">Welcome To
            <span style="color: rgb(5, 136, 5); font-family:'Barcelony Signature';">Rong</span> <span
                style="color: rgb(65, 107, 65);">Krishi</span>!
        </h3>
        <div class="container">
            <div class="row" style="margin-top:5px;">
                <div class="col-lg-8">
                    <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                        <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside"
                            data-toggle="owl" data-owl-options='{
                                    "nav": false, 
                                    "responsive": {
                                        "768": {
                                            "nav": true
                                        }
                                    }
                                }'>
                            <div class="intro-slide" style="margin-top:0;">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)"
                                            srcset="{{$getSystemSettingApp->Banner1_1()}}">
                                        <img src="{{$getSystemSettingApp->Banner1()}}" alt="Image Desc">
                                    </picture>
                                </figure>

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">Our Collection</h3>
                                    <h1 class="intro-title">{{$getSystemSettingApp->slogan1}}</h1>

                                    <a href="#products" class="btn btn-outline-white">
                                        <span>SHOP NOW</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)"
                                            srcset="{{$getSystemSettingApp->Banner2_1()}}">
                                        <img src="{{$getSystemSettingApp->Banner2()}}" alt="Image Desc">
                                    </picture>
                                </figure>

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">{{$getSystemSettingApp->slogan2}}</h3>
                                    < <h1 class="intro-title">New Arrivals</h1>

                                        <a href="#products" class="btn btn-outline-white">
                                            <span>SHOP NOW</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                </div>
                            </div>

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)"
                                            srcset="{{$getSystemSettingApp->Banner3_1()}}">
                                        <img src="{{$getSystemSettingApp->Banner3()}}" alt="Image Desc">
                                    </picture>
                                </figure>

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">{{$getSystemSettingApp->slogan3}}</h3>
                                    <!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">National & International Delivery</h1>
                                    <!-- End .intro-title -->

                                    <a href="#products" class="btn btn-outline-white">
                                        <span>SHOP NOW</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .intro-content -->
                            </div><!-- End .intro-slide -->
                        </div><!-- End .intro-slider owl-carousel owl-simple -->

                        <span class="slider-loader"></span><!-- End .slider-loader -->
                    </div><!-- End .intro-slider-container -->
                </div><!-- End .col-lg-8 -->
                <div class="col-lg-4">
                    <div class="intro-banners">
                        <div class="row row-sm">
                            <div class="col-md-6 col-lg-12">
                                <div class="banner banner-display">
                                    <a href="#">
                                        <img style="height: 215px;" src="{{$getSystemSettingApp->Banner4()}}"
                                            alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle text-darkwhite"><a href="#"><span
                                                    style="background: rgb(11, 32, 41);">Shop with us today!</span></a>
                                        </h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title text-white"><a
                                                href="#">{{$getSystemSettingApp->slogan4}}</a></h3>
                                        <!-- End .banner-title -->
                                        <a href="#products" class="btn btn-outline-white banner-link">Shop Now<i
                                                class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-md-6 col-lg-12 -->

                            <div class="col-md-6 col-lg-12">
                                <div class="banner banner-display mb-0">
                                    <a href="#">
                                        <img style="height: 215px; margin-top: 0;"
                                            src="{{$getSystemSettingApp->Banner5()}}" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle text-darkwhite"><a href="#"><span
                                                    style="background: rgb(11, 32, 41);">New in</span></a></h4>
                                        <!-- End .banner-subtitle -->
                                        <h3 class="banner-title text-white"><a
                                                href="#">{{$getSystemSettingApp->slogan5}}</a></h3>
                                        <!-- End .banner-title -->
                                        <a href="{{url('/blog')}}" class="btn btn-outline-white banner-link">Discover
                                            Now<i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-md-6 col-lg-12 -->
                        </div><!-- End .row row-sm -->
                    </div><!-- End .intro-banners -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->

            <div class="mb-6"></div><!-- End .mb-6 -->

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h2 class="title" style="text-align: center;">The Hub for Fresh, Healthy Produce and Innovation.
                            <span style="color: green; font-family:'Barcelony Signature';">Where Quality Meets Freshness
                                in Agriculture.</span>
                        </h2>
                    </div><!-- End .brands-text -->
                </div>
            </div><!-- End .row -->


            <div class="mb-6"></div><!-- End .mb-6 -->
            <div>
                <h1 style="text-align: center; font-family: 'Courier New', monospace;">Let’s Introduce us</h1>
                <hr>
                <p style="text-align: center; font-size:22px; center; font-family: 'Times New Roman';">{!!
                    $getAboutUs->intro !!}</p>
                <div style="display: flex; justify-content:center; align-items:center; margin-top:20px;">
                    <a href="{{url('/about_us')}}"><button class="btn btn-primary"
                            style="padding: 10px 20px; margin-button:1px;">Learn More</button></a>
                </div>
                <div class="mb-6"></div><!-- End .mb-6 -->

                <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <h2 class="title">Who We Are?</h2><!-- End .title -->
                                <p style="font-weight: 510px; font-size:18px; color:black;">Empowering Agriculture,
                                    <span
                                        style="color: green; font-family:'Barcelony Signature'; font-size:20px;">Enriching
                                        Lives</span>
                                </p><!-- End .lead text-primary -->
                                <p class="mb-2">{!! $getAboutUs->who_we_are !!}</p>

                                <a href="{{url('/blog')}}" class="btn btn-sm btn-minwidth btn-outline-primary-2"
                                    style="margin-top: 10px;">
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
                <div class="mb-6"></div><!-- End .mb-6 -->
                
                <div class="container" style="margin-top: 1px;" id="products">
                    <div class="heading heading-center mb-3">
                        <h2 class="title-lg">Our Products</h2><!-- End .title -->

                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab"
                                    role="tab" aria-controls="trendy-all-tab" aria-selected="true">Featured</a>
                            </li>
                        </ul>
                    </div><!-- End .heading -->
                    @if(!empty($total_product))
                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach($getOurProduct as $value)
                            @php
                            $getProductImage = $value->getImageSingle($value->id);
                            @endphp
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="{{$value->slug}}">
                                            @if(!empty($getProductImage) && !empty($getProductImage->getImage()))
                                            <img style="height: 280px; width: 380px; object-fit: cover;"
                                                src="{{$getProductImage->getImage()}}" alt="{{$value->title}}"
                                                class="product-image">
                                            @endif
                                        </a>


                                        <div class="product-action-vertical">
                                            @if(!empty(Auth::check()))

                                            <a href="javascript:;" data-toggle="modal" class="add_to_wishlist add_to_wishlist{{ $value->id }}
                                             btn-product-icon btn-wishlist btn-expandable
                                             {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }}"
                                                id="{{ $value->id }}" title="Wishlist"><span>add to wishlist</span></a>
                                            @else
                                            <a href="#signin-modal" data-toggle="modal"
                                                class="btn-product-icon btn-wishlist btn-expandable"
                                                title="Wishlist"><span>add to wishlist</span></a>
                                            @endif
                                        </div>


                                        @php
                                        $getAvailable = App\Models\Inventory::getSingle($value->id);
                                        @endphp
                                        @if($getAvailable->remaining_quantity > 0)
                                        <form action="{{url('/cart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$value->id}}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="product_name" value="{{$value->title}}">
                                            <div class="product-action">
                                                <button type="submit" style="width: 100px; "
                                                    class="btn-product btn-cart btn btn-outline-primary-2 btn-order btn-block">
                                                    <span class="btn-text">add to cart</span>
                                                    <span class="btn-hover-text">add to your shopping cart</span>
                                                </button>
                                            </div>
                                        </form>
                                        @else
                                        <div class="product-action">
                                            <a href="javascript:;" style="width: 100%; " class="btn btn-danger">
                                                <span class="btn-text">OUT OF STOCK</span>
                                                <span class="btn-hover-text">out of stock</span>
                                            </a>
                                        </div>
                                        @endif
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a
                                                href="{{url($value->category_slug.'/'.$value->sub_category_slug)}}">{{$value->sub_category_name}}</a>
                                        </div>
                                        <h3 class="product-title"><a href="{{$value->slug}}">{{$value->title}}</a></h3>
                                        <div class="product-price">
                                            NPR {{number_format($value->price, 2)}}
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div>
                                            </div>
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mb-6"></div>




    <div class="container">
        <div class="heading heading-center mb-3">
            <h2 class="title-lg">Our Services</h2><!-- End .title -->
        </div><!-- End .heading -->
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-rocket"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                        <p>Free shipping for orders over NPR50000.00</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-rotate-left"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                        <p>Free 100% money back guarantee</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-life-ring"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                        <p>Alway online feedback 24/7</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div><!-- End .row -->

        <div class="mb-2"></div><!-- End .mb-2 -->
    </div><!-- End .container -->
    <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
        <div class="container">
            <h2 class="title-lg text-center mb-3 mb-md-4">From Our Blog</h2><!-- End .title-lg text-center -->

            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "items": 3,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":1
                            },
                            "600": {
                                "items":2
                            },
                            "992": {
                                "items":3
                            }
                        }
                    }'>
                @foreach($getBlog->take(7) as $value)
                @php
                $getImage = $value->getImageSingle($value->id);
                @endphp
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="{{url('/blog/'.$value->slug)}}">
                            @if(!empty($getImage) && !empty($getImage->getImage()))
                            <img style="width: 100%; height: 300px;" src="{{$getImage->getImage()}}" alt="image desc">
                            @endif
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body pb-4 text-center">
                        <div class="entry-meta">
                            <a href="#">{{date('M d, Y', strtotime($value->created_at))}}</a>,
                            {{$value->getCommentCount()}} Comments
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="{{url('/blog/'.$value->slug)}}">{{$value->title}}</a>
                        </h3><!-- End .entry-title -->

                        <div class="entry-content">
                            <p>{!! $value->description !!}</p>
                            <a href="{{url('/blog/'.$value->slug)}}" class="read-more">Read More</a>
                        </div><!-- End .entry-content -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->
                @endforeach
            </div>
        </div>

        <div class="more-container text-center mb-0 mt-3">
            <a href="{{url('/blog')}}" class="btn btn-outline-darker btn-more"><span>View more articles</span><i
                    class="icon-long-arrow-right"></i></a>
        </div>
    </div>
    <hr>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12">
            <div>
                <h2 class="title" style="text-align: center; margin-top:20px;">Got more questions? Contact our support
                    team anytime for assistance!
                    <a href="{{url('/contact_us')}}" style="font-weight: 501px; font-size:18px;"><span>CONTACT
                            NOW</span><i class="icon-long-arrow-right"></i></a>
                </h2>
            </div><!-- End .brands-text -->
        </div>
    </div><!-- End .row -->
    <hr>


    <div class="cta cta-display bg-image pt-4 pb-4"
        style="background-image: url(assets/images/backgrounds/cta/bg-6.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-8">
                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                        <div class="col">
                            <h3 style="text-align: center;" class="cta-title text-white">Become a member and enjoy fresh
                                discounts and special offers!</h3>
                        </div>
                        <a style="margin-top: 20px; background:green;" href="{{url('/contact_us')}}"
                            class="btn btn-outline-white"><span>Request
                                Membership</span><i class="icon-long-arrow-right"></i></a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="row no-gutters bg-white newsletter-popup-content">
                <div class="col-xl-3-5col col-lg-7 banner-content-wrap" style="margin-bottom: 40px;">
                    <div class="banner-content text-center">
                        <h2 class="banner-title">From <span>Local<light> Farms</light></span> to Global Markets</h2>
                        <p>Start Strong with RongKrishi – Your Partner in Agriculture Innovation!</p>
                        {{-- <form action="#">
                            <div class="input-group input-group-round" style="margin-left: 125px;">
                                <div class="input-group-append">
                                    <a href="{{url('/')}}#products"
                                        class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Go to Shop</span>
                                        <span class="btn-hover-text">Shop Now</span>
                                    </a>
                                </div>
                            </div><!-- .End .input-group -->
                        </form> --}}
                        {{-- <form action="#">
                            <div class="input-group input-group-round">
                                <input type="email" class="form-control form-control-white"
                                    placeholder="Your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><span>go</span></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form> --}}
                        {{-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                            <label class="custom-control-label" for="register-policy-2">Do not show this popup
                                again</label>
                        </div><!-- End .custom-checkbox --> --}}
                    </div>
                </div>
                <div class="col-xl-2-5col col-lg-5 ">
                    <img src="{{url('')}}/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img"
                        alt="newsletter">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection