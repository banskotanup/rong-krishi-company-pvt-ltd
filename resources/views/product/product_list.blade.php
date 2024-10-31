@extends('home.layouts.app')
@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{url('')}}/assets/images/page-header-bg.jpg')">
        <div class="container">
            @if(!empty($getSubCategory))
            <h1 class="page-title">{{$getSubCategory->name}}</h1>
            @elseif(!empty($getCategory))
            <h1 class="page-title">{{$getCategory->name}}</h1>
            @else
            <h1 class="page-title">Search : {{Request::get('q')}}</h1>
            @endif
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                @if(!empty($getSubCategory))
                <li class="breadcrumb-item" aria-current="page"><a
                        href="{{url($getCategory->slug)}}">{{$getCategory->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getSubCategory->name}}</li>
                @elseif(!empty($getCategory))
                <li class="breadcrumb-item active" aria-current="page">{{$getCategory->name}}</li>
                @endif
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>9 of 56</span> Products
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @foreach($getProduct as $value)
                            @php
                            $getProductImage = $value->getImageSingle($value->id);
                            @endphp
                            <div class="col-6 col-md-4 col-lg-4">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="{{$value->slug}}">
                                            @if(!empty($getProductImage) && !empty($getProductImage->getImage()))
                                            <img style="height: 280px; width: 280px; object-fit: cover;"
                                                src="{{$getProductImage->getImage()}}" alt="{{$value->title}}"
                                                class="product-image">
                                            @endif
                                        </a>


                                        <form action="{{url('/wishlist')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$value->id}}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="product_name" value="{{$value->title}}">
                                            <div class="product-action-vertical">
                                                <button type="submit" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                                        to wishlist</span></button>
                                            </div>
                                        </form>
                                        


                                        <form action="{{url('/cart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$value->id}}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="product_name" value="{{$value->title}}">
                                            <div class="product-action">
                                                <button type="submit"
                                                    class="btn-product btn-cart"><span>add to cart</span>
                                                </button>
                                            </div>

                                        </form>
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

                    <div style="padding: 10px; float: right;">
                        {!! $getProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>

                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget widget-clean -->

                        @if(!empty($getSubCategoryFilter))
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                    aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach($getSubCategoryFilter as $f_category)
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="cat-{{$f_category->id}}">
                                                <label class="custom-control-label"
                                                    for="cat-{{$f_category->id}}">{{$f_category->name}}</label>
                                            </div>
                                            <span class="item-count">{{$f_category->totalProduct()}}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                    aria-controls="widget-5">
                                    Price
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div><!-- End .filter-price-text -->

                                        <div id="price-slider"></div><!-- End #price-slider -->
                                    </div><!-- End .filter-price -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection