@extends('home.layouts.app')
@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url($getProduct->getCategory->slug)}}">{{
                        $getProduct->getCategory->name}}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{url($getProduct->getCategory->slug.'/'.$getProduct->getSubCategory->slug)}}">{{
                        $getProduct->getSubCategory->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getProduct->title}}</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                @php
                                $getProductImage = $getProduct->getImageSingle($getProduct->id);
                                @endphp
                                @if(!empty($getProductImage) && !empty($getProductImage->getImage()))
                                <img id="product-zoom" src="{{$getProductImage->getImage()}}"
                                    alt="{{$getProduct->title}}">
                                @endif

                            </figure>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$getProduct->title}}</h1>

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div>
                                </div>
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                            </div>

                            <div class="product-price">
                                NRP {{number_format($getProduct->price, 2)}}
                            </div>

                            <div class="product-content">
                                <p>{{$getProduct->short_description}}</p>
                            </div>

                            <form action="{{url('/cart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$getProduct->id}}">
                            <input type="hidden" name="product_name" value="{{$getProduct->title}}">
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="100"
                                        step="1" name="qty" data-decimals="0" required>
                                </div>
                            </div>

                            <div class="product-details-action">
                                <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                <div class="details-action-wrapper">
                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                                            Wishlist</span></a>
                                </div>
                            </div>

                        </form>

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="{{url($getProduct->getCategory->slug)}}">{{
                                        $getProduct->getCategory->name}}</a>,
                                    <a
                                        href="{{url($getProduct->getCategory->slug.'/'.$getProduct->getSubCategory->slug)}}">{{
                                        $getProduct->getSubCategory->name}}</a>
                                </div>

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                            class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                            class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                            class="icon-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-details-tab product-details-extended">
            <div class="container">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                            role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab"
                            aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab"
                            role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                            role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                    aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProduct -> description !!}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProduct -> additional_information !!}
                        </div>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                    aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        <div class="container">
                            {!! $getProduct -> shipping_returns !!}
                        </div><!-- End .container -->
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                    aria-labelledby="product-review-link">
                    <div class="reviews">
                        <div class="container">
                            <h3>Reviews (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">6 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Good, perfect size</h4>

                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                                dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                                atque blanditiis commodi perspiciatis doloremque, possimus, explicabo,
                                                autem fugit beatae quae voluptas!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->

                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">5 days ago</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4>Very good</h4>

                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis
                                                laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi,
                                                quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                        </div><!-- End .review-content -->

                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div><!-- End .review-action -->
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                        </div><!-- End .container -->
                    </div><!-- End .reviews -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        <div class="container">
            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>

                @foreach($getRelatedProduct as $product)
                @php
                $getProductImage = $product->getImageSingle($product->id);
                @endphp
                <div class="product product-7">
                    <figure class="product-media">
                        <a href="{{$product->slug}}">
                            @if(!empty($getProductImage) && !empty($getProductImage->getImage()))
                            <img style="height: 280px; width: 280px; object-fit: cover;"
                                src="{{$getProductImage->getImage()}}" alt="{{$product->title}}" class="product-image">
                            @endif
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                    wishlist</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a
                                href="{{url($product->category_slug.'/'.$product->sub_category_slug)}}">{{$product->sub_category_name}}</a>
                        </div>
                        <h3 class="product-title"><a href="{{$product->slug}}">{{$product->title}}</a></h3>

                        <div class="product-price">
                            NPR {{number_format($product->price, 2)}}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 20%;"></div>
                            </div>
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</main>

@endsection