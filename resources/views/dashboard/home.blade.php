<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="{{ asset('Admin/assets/build/images/favicon.ico') }}" type="image/ico"/>
    <title> پنل مدیریت </title>

    <!-- Font Awesome -->
    <link href="{{ asset('Admin/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('Admin/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/assets/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('Admin/assets/build/css/custom.min.css') }}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{ asset('Admin/assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('Admin/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('Admin/assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('Admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery.js') }}"></script>

    @yield('headscript')
</head>
<!-- /header content -->
<body class="nav-md">
@include('dashboard.blocks.chaneImageModal')
<div class="container body">
    <div class="main_container">

    @include('dashboard.blocks.rightmenu')

    <!-- top navigation -->
    @include('dashboard.blocks.topmenu')
    <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                @include('dashboard.blocks.4topmenu')


                @yield('content')


            </div>
        </div>
        <!-- /page content -->


        <!-- footer content -->
        <footer class="hidden-print">
            {{--<div class="pull-left">
                Gentelella - قالب پنل مدیریت بوت استرپ <a href="https://parmonet.com">Colorlib</a> | پارسی شده توسط <a
                    href="">Parmonet</a>
            </div>--}}
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<div id="lock_screen">
    <table>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>
</div>


<!-- jQuery -->
<script src="{{ asset('Admin/assets/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('Admin/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('Admin/assets/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('Admin/assets/vendors/nprogress/nprogress.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('Admin/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('Admin/assets/vendors/iCheck/icheck.min.js') }}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{ asset('Admin/assets/vendors/moment/min/moment.min.js') }}"></script>

<script src="{{ asset('Admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- Chart.js -->
<script src="{{ asset('Admin/assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- jQuery Sparklines -->
<script src="{{ asset('Admin/assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('Admin/assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('Admin/assets/vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('Admin/assets/vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('Admin/assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('Admin/assets/vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('Admin/assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('Admin/assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('Admin/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('Admin/assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('Admin/assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('Admin/assets/vendors/DateJS/build/production/date.min.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('Admin/assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('Admin/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('Admin/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('Admin/assets/build/js/custom.min.js') }}"></script>

<!-- /bootstrap-daterangepicker -->

@yield('footerscript')

</body>
</html>
