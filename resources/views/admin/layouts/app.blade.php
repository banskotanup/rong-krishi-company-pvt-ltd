<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{!empty($header_title) ? $header_title : ''}} - Rongkrishi</title>

  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>

  @php
  $getSystemSettingApp = App\Models\SystemSetting::getSingle();
  @endphp
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <link rel="icon" type="image/x-icon" href="{{$getSystemSettingApp->getFevicon()}}">
  <style>
    .hide {
      display: none;
    }

    .btn_edit:hover+.hide {
      display: block;
      color: grey;
    }

    .btn_edit:hover {
      color: blue;
      background-color: white;
    }

    .btn_delete:hover {
      color: red;
      background-color: white;
    }

    @media (max-width: 500px) {
      .btn_edit {
        margin-bottom: 1px;
      }
    }
  </style>
  @yield('style')
</head>
<!--
  `body` tag options:
  
    Apply one or more of the following classes to to the body tag
    to get the desired effect
  
    * sidebar-collapse
    * sidebar-mini
  -->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('admin.layouts.header')
    @yield('content')
    @include('admin.layouts.footer')

  </div>

  <script src="/admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="/admin/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="/admin/plugins/chart.js/Chart.min.js"></script>
  <script src="/admin/plugins/moment/moment.min.js"></script>
  <script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script type="text/javascript">
    function confirmation(ev) { 
              ev.preventDefault(); 
              var urlToRedirect = ev.currentTarget.getAttribute('href'); 
              console.log(urlToRedirect); 
              Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire({
                      title: "Deleted!",
                      text: "Your data has been deleted.",
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

<script type="text/javascript">
  function logout_confirmation(ev) { 
            ev.preventDefault(); 
            var urlToRedirect = ev.currentTarget.getAttribute('href'); 
            console.log(urlToRedirect); 
            Swal.fire({
              title: "Are you sure?",
              text: "Click yes to log out. Hope to see you back soon!",
              icon: "warning",
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