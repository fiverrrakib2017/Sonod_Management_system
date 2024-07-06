<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('Backend/assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/css/jquery-jvectormap-1.2.2.css">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{asset('Backend/assets/css/dataTables.bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('Backend/assets/css/upsonod.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('Backend/assets/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/css/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Backend/assets/css/toastr.min.css')}}">
    <link href="{{ asset('Backend/assets/css/deleteModal.css') }}" rel="stylesheet" type="text/css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
     <!-- jQuery 2.2.3 -->
     <script src="{{asset('Backend/assets/js/jquery.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('Backend/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Backend/assets/js/dataTables.bootstrap.min.js')}}"></script>
    <!--datepicker-->
    <script src="{{asset('Backend/assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('Backend/assets/js/bootstrap-timepicker.min.js')}}"></script>
    
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('Backend.Include.Header')
 <aside class="main-sidebar">
    @include('Backend.Include.Sidebar')
</aside>
        <div class="content-wrapper">
           @yield('content')
        </div>
        @include('Backend.Include.Footer')
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('Backend/assets/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('Backend/assets/js/icheck.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('Backend/assets/js/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('Backend/assets/js/adminlte.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('Backend/assets/js/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap  -->
    <!--<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
    <!-- SlimScroll -->
    <!--<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="{{ asset('Backend/assets/js/toastr.min.js') }}"></script>
    @yield('script')
</body>
</html>