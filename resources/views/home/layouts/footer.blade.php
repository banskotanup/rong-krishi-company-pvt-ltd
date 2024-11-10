<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{$getSystemSettingApp->getLogo()}}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                        <h3 style="color: #777; font-size: 16px;">{{$getSystemSettingApp->footer_description}}</h3>

                        <div class="social-icons" style="margin-top: 20px;">
                            <a href="{{$getSystemSettingApp->facebook_link}}" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="{{$getSystemSettingApp->twitter_link}}" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="{{$getSystemSettingApp->instagram_link}}" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="{{$getSystemSettingApp->youtube_link}}" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                            <a href="{{$getSystemSettingApp->pinterest_link}}" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4>

                        <ul class="widget-list">
                            <li><a href="{{url('/about_us')}}">About Us</a></li>
                            <li><a href="{{url('/faq')}}">How to shop on Rong Krishi Company?</a></li>
                            <li><a href="{{url('/faq')}}">FAQ</a></li>
                            <li><a href="{{url('/contact_us')}}">Contact us</a></li>
                            <li><a href="#signin-modal" data-toggle="modal">Log in</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>

                        <ul class="widget-list">
                            <li><a href="{{url('/faq')}}">Payment Methods</a></li>
                            <li><a href="{{url('/faq')}}">Money-back guarantee!</a></li>
                            <li><a href="{{url('/faq')}}">Returns</a></li>
                            <li><a href="{{url('/faq')}}">Shipping</a></li>
                            <li><a href="{{url('/faq')}}">Terms and conditions</a></li>
                            <li><a href="{{url('/faq')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>

                        <ul class="widget-list">
                            <li><a href="#signin-modal" data-toggle="modal">Sign In</a></li>
                            <li><a href="{{url('/cart')}}">View Cart</a></li>
                            <li><a href="{{url('my-wishlist')}}">My Wishlist</a></li>
                            <li><a href="{{url('/user_orders')}}">Track My Order</a></li>
                            <li><a href="{{url('/faq')}}">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright &copy; <script>document.write(new Date().getFullYear())</script> NextGenIT. All Rights Reserved.</p>
            <figure class="footer-payments">
                <img src="{{$getSystemSettingApp->getFooterPaymentIcon()}}" alt="Payment methods" width="272" height="20">
            </figure>
        </div>
    </div>
</footer>