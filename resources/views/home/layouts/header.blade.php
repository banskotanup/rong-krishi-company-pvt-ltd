<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header" style="margin-right: 20px;">
                    <a href="#">NPR</a>
                </div>

                <div class="header-dropdown">
                    <a href="#">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                            <li><a href="#">Nepali</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>Call: +977 9876543210</a></li>
                            <li><a href="{{url('wishlist')}}"><i class="icon-heart-o"></i>My Wishlist
                                    <span>(3)</span></a></li>
                            <li><a href="{{url('/about_us')}}">About Us</a></li>
                            <li><a href="{{url('/contact_us')}}">Contact Us</a></li>
                            @if(!empty(Auth::check()))
                                <li><a href="{{url('/log_out')}}"><i class="icon-user"></i>Logout</a></li>
                            @else
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{url('/')}}" class="logo">
                    <img src="{{url('trslogo.png')}}" width="40" height="10">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container {{ Request::is('/') ? 'active' : ''}}">
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="{{ Request::is('') ? 'active' : ''}}">
                            <a href="javascript:;" style="margin-left:1px;" class="sf-with-ul">Shop</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                                @php
                                                    $getCategoryHeader  = App\Models\Category::getCategoryMenu();
                                                @endphp
                                                @foreach($getCategoryHeader as $value_category_header)
                                                    @if(!empty($value_category_header->getSubCategory->count()))
                                                        <div class="col-md-4" style="margin-bottom: 20px;">
                                                            <a href="{{url($value_category_header->slug)}}" class="menu-title">{{$value_category_header->name}}</a>
                                                            <ul>
                                                                @foreach($value_category_header->getSubCategory as $value_h_sub_category)
                                                                    @if(!empty($value_h_sub_category->getProduct->count()))
                                                                        <li><a href="{{url($value_category_header->slug.'/'.$value_h_sub_category->slug)}}">{{$value_h_sub_category->name}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="{{ Request::is('about_us', 'contact_us', 'faq', 'error_404') ? 'active' : ''}}">
                            <a href="#" class="sf-with-ul">Pages</a>

                            <ul>
                                <li>
                                    <a href="{{url('/about_us')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{url('/contact_us')}}">Contact</a>
                                </li>
                                <li><a href="{{url('/faq')}}">FAQs</a></li>
                                <li><a href="{{url('/error_404')}}">Error 404</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('blog') ? 'active' : ''}}">
                            <a href="{{url('/blog')}}">Blog</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="{{url('search')}}" method="GET">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..."
                                required>
                        </div>
                    </form>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">{{Cart::count();}}</span>
                    </a>

                    @if(!empty(Cart::count()))
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                @foreach (Cart::content() as $data)
                                @php
                                    $getCartProduct = App\Models\Product::getSingle($data->id);
                                @endphp
                                @if(!empty($getCartProduct))
                                    @php
                                    $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id);
                                    @endphp
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="{{url($getCartProduct->slug)}}">{{$getCartProduct->title}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{$data->qty}}</span>
                                                x NPR{{$data->price}}
                                            </span>
                                        </div>

                                        <figure class="product-image-container">
                                            <a href="{{url($getCartProduct->slug)}}" class="product-image">
                                                <img src="{{$getProductImage->getImage()}}" alt="product">
                                            </a>
                                        </figure>
                                        <a href="{{'/cart/delete/'.$data->rowId}}" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div>
                                @endif
                                @endforeach
                            </div>

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">NPR{{Cart::subTotal()}}</span>
                            </div>
                            <div class="dropdown-cart-action">
                                <a href="{{url('/cart')}}" class="btn btn-primary">View Cart</a>
                                <a href="{{url('/checkout')}}" class="btn btn-outline-primary-2"><span>Checkout</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>