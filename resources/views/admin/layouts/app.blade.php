<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{!empty($header_title) ? $header_title : ''}} - Rongkrishi</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <link rel="icon" type="image/x-icon" href="trslogo.png">
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
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script type="text/javascript">
    function confirmation(ev) { 
              ev.preventDefault(); 
              var urlToRedirect = ev.currentTarget.getAttribute('href'); 
              console.log(urlToRedirect); 
            swal({ 
            title: "Are you sure to Delete this", 
            text: "You will not be able to revert this!", 
            icon: "warning",
            buttons: true, 
            dangerMode: true, 
            })
          .then((willCancel) => { 
            if (willCancel) { 
              window.location.href= urlToRedirect; 
            }
          });
        }
  </script>

  @yield('script')
</body>

</html>