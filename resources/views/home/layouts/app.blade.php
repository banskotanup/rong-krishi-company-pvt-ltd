<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('home.loader.custom_loader_css')
    <title>{{!empty($meta_title) ? $meta_title : ''}}</title>
    @if(!empty($meta_description))
    <meta name="description" content="{{$meta_description}}">
    @endif
    @if((!empty($meta_keywords)))
    <meta name="keywords" content="{{$meta_keywords}}">
    @endif

    @php
        $getSystemSettingApp = App\Models\SystemSetting::getSingle();
    @endphp
    <link rel="icon" type="image/x-icon" href="{{$getSystemSettingApp->getFevicon()}}">

    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/plugins/nouislider/nouislider.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    @include('home.cssJs.custom_style')
    @yield('style')

    <style type="text/css">
        .btn-wishlist-add::before{
            content: '\f233' !important;
        }
    </style>
    
</head>

<body>

    <div class="page-wrapper">
    @include('home.layouts.header')
    @yield('content')
    @include('home.layouts.footer')

    </div>
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <div class="mobile-menu-overlay"></div>

    @include('home.layouts.mobile_menu')



    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <div style="margin-bottom: 20px; color:red;" id="messagedivinpopupmodal">
                                        {{-- error message goes here --}}
                                    </div>
                                    <form action="" id="SubmitFormLogin" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="singin-email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="singin-password">Password<span style="color: red">*</span></label>
                                            <input type="password" class="form-control" id="singin-password" name="password" required>
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="is_remember" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div>

                                            <a href="{{url('/forgot-password')}}" class="forgot-link">Forgot Your Password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('assets/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('assets/js/superfish.min.js')}}"></script>
    <script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('assets/js/nouislider.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{url('assets/js/wNumb.js')}}"></script>

    <script src="{{url('assets/js/main.js')}}"></script>
    @include('home.loader.custom_loader_js')
    <script type="text/javascript">
        $('body').delegate('#SubmitFormLogin', 'submit', function(e){
            e.preventDefault();
            $.ajax({
                type : "POST",
                url : "{{url('/auth_login')}}",
                data : $(this).serialize(),
                dataType : "json",
                success: function(data){
                    if(data.status == true){
                        location.reload();
                    }
                    else{
                        $('#messagedivinpopupmodal').html(data.html);
                    }
                },
                error: function(data){

                }
            });
        });
        
        $('body').delegate('.add_to_wishlist', 'click', function(e){
            var product_id = $(this).attr('id');
            $.ajax({
                type : "POST",
                url : "{{ url('add_to_wishlist') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    product_id:product_id,
                    },
                dataType : "json",
                success: function(data)
                {
                    if(data.is_Wishlist == 0)
                      {
                        $('.add_to_wishlist'+product_id).removeClass('btn-wishlist-add');
                        location.reload();
                      }
                    else
                    {
                        $('.add_to_wishlist'+product_id).addClass('btn-wishlist-add');
                        location.reload();
                    }
                }
            });
        });

        if(document.getElementById('newsletter-popup-form')) {
        setTimeout(function() {
            var mpInstance = $.magnificPopup.instance;
            if (mpInstance.isOpen) {
                mpInstance.close();
            }

            setTimeout(function() {
                $.magnificPopup.open({
                    items: {
                        src: '#newsletter-popup-form'
                    },
                    type: 'inline',
                    removalDelay: 350,
                    callbacks: {
                        open: function() {
                            $('body').css('overflow-x', 'visible');
                            $('.sticky-header.fixed').css('padding-right', '1.7rem');
                        },
                        close: function() {
                            $('body').css('overflow-x', 'hidden');
                            $('.sticky-header.fixed').css('padding-right', '0');
                        }
                    }
                });
            }, 500)
        }, 10000)
    }
    </script>

<script type="text/javascript">
    function logout_confirmation(ev) { 
              ev.preventDefault(); 
              var urlToRedirect = ev.currentTarget.getAttribute('href'); 
              console.log(urlToRedirect); 
              Swal.fire({
                title: "Are you sure?",
                text: "Click yes to log out. Hope to see you back soon!",
                icon: "warning",
                width: 400,
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Log Out!"
              }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire({
                      title: "Logged out safely🌟",
                      text: "Thanks for visiting, and remember, we’re just a click away!",
                      icon: "success"
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.href= urlToRedirect; 
                      }

                    });
                    
                  }
                });
              }
        
  </script>
    
    @yield('script')
</body>
</html>