<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..."
                required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="{{url('/')}}">Home</a>
                </li>
                @php
                    $getCategoryMobile = App\Models\Category::getCategoryMenu();
                @endphp
                 @foreach($getCategoryMobile as $value_category_header)
                    @if(!empty($value_category_header->getSubCategory->count()))
                        <li>
                            <a href="{{url($value_category_header->slug)}}">{{$value_category_header->name}}</a>
                            <ul>
                                @foreach($value_category_header->getSubCategory as $value_h_sub_category)
                                <li><a href="{{url($value_category_header->slug.'/'.$value_h_sub_category->slug)}}">{{$value_h_sub_category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
                <li>
                    <a href="#">Pages</a>
                    <ul>
                        <li>
                            <a href="{{url('/about_us')}}">About Us</a>
                        </li>
                        <li>
                            <a href="{{url('/contact_us')}}">Contact Us</a>
                        </li>
                        <li><a href="{{url('/faq')}}">FAQs</a></li>
                        <li><a href="{{url('/error_404')}}">Error 404</a></li>
                    </ul>
                </li>
                <li>
                    <a href="blog.html">Blog</a>

                    <ul>
                        <li><a href="blog.html">Classic</a></li>
                        <li><a href="blog-listing.html">Listing</a></li>
                        <li>
                            <a href="#">Grid</a>
                            <ul>
                                <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Masonry</a>
                            <ul>
                                <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Mask</a>
                            <ul>
                                <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Single Post</a>
                            <ul>
                                <li><a href="single.html">Default with sidebar</a></li>
                                <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                            </ul>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="{{url('/cart')}}">Cart</a>
                </li>
                <li>
                    <a href="">Checkout</a>
                </li>
                <li>
                    <a href="">Wishlist</a>
                </li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->