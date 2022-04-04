<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>فروشگاه</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <script src="{{ asset('themes/assets/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Favicons -->
    <link href="{{ asset('themes/assets/img/favicon.png')  }}" rel="icon">
    <link href="{{ asset('themes/assets/img/favicon.png')  }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('themes/assets/vendor/bootstrap/css/bootstrap.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/icofont/icofont.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/boxicons/css/boxicons.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/venobox/venobox.css')  }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/remixicon/remixicon.css')  }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/owl.carousel/assets/owl.carousel.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('themes/assets/vendor/aos/aos.css')  }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('themes/assets/css/style.css')  }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Bootslander - v2.2.0
    * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <?php
    if(\Request::route()->getName() == "blog.post" && isset($item->seo)){
    $seo = isset($item->seo) ? json_decode($item->seo) : '';
    $keyWords = isset($seo->keyWords) ? json_decode($seo->keyWords) : '';
    $seoDescription = '';
    $keys = '';
    for ($i = 0 ; $i < 6 ; $i++) {
        if(isset($keyWords[$i]))
        $keys .= $keyWords[$i].", ";
    }
    if(isset($seo->seoDescription))
        $seoDescription = $seo->seoDescription;
    ?>
    <meta name="description" content="{!! $seoDescription !!}">
    <meta name="keywords" content="{!! $keys !!}">
    <?php
        }else{
        ?>
    <meta name="description" content="دانباکس">
    <meta name="keywords" content="دانباکس">
    <?php
    }
    ?>
    <meta name="author" content="Sadjad Sadeghi">

</head>

<body>

<style>
    @font-face {
        font-family: 'iransans';
        src: url("{{ asset('fonts/IRANSansWeb(FaNum).eot') }}") format('embedded-opentype'),
        url("{{ asset('fonts/IRANSansWeb(FaNum).woff') }}") format('woff'),
        url("{{ asset('fonts/IRANSansWeb(FaNum).ttf') }}") format('truetype');
    }
    *{
        font-family: 'iransans' !important;
    }
</style>

<!-- ======= Header ======= -->
<?php
if(\Request::route()->getName() == "home"){
?>
    @include('partial.home-menu')
<?php
    }
else if(\Request::route()->getName() == "dashboard.home.edit"){?>
@include('partial.dashboard-menu')
<?php
}else{ ?>
    @include('partial.inner-menu')
<?php
}
?>

    @yield('content')

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3>Bootslander</h3>
                        <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
                        <p>
                            A108 Adam Street <br>
                            NY 535022, USA<br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('themes/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('themes/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('themes/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('themes/assets/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('themes/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('themes/assets/vendor/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('themes/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('themes/assets/vendor/aos/aos.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('themes/assets/js/main.js') }}"></script>


</body>

</html>
