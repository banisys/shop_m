<!-- ======= Header ======= -->

<header id="header" class="fixed-top d-flex align-items-center header-transparent text-right" style="direction: rtl">
    <div class="container d-flex align-items-center">

        <div class="logo mx-auto">
            {{--<h1 class="text-light"><a href="{{ route('home') }}"><span>دانباکس</span></a></h1>--}}
            <a href="{{ route('home') }}">
                <img src="{{ isset($images->logo) ? asset('upload/images/home')."/".$images->logo : asset('upload/images/img/hero-img.png') }}">
            </a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active">
                    <a href="">
                        ثبت سفارش
                    </a>
                </li>
                <li>
                    <a href="">
                        همکاری با ما
                    </a>
                </li>
                <li>
                    <a href="#about">
                        خدمات
                    </a>
                </li>
                <li>
                    <a href="#features">
                        نمونه کارها
                    </a>
                </li>
                <li>
                    <a href="#gallery">
                        چرا دانباکس
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.posts') }}">
                        بلاگ باکس
                    </a>
                </li>
                <li>
                    <a href="#contact">
                        تماس با ما
                    </a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
