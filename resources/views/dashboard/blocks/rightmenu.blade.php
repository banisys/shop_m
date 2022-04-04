<div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <i class="fa fa-paw"></i> <span></span>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        {{--<img src="{{ asset('images/admin')."/".Auth::user()->image }}" alt="..." class="img-circle profile_img">--}}
                    </div>
                    <div class="profile_info">
                        <br>
                        <h2>
                            <?php
/*                                echo Auth::user()->name;
                            */?>
                        </h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="{{ route('dashboard.home') }}"><i class="fa fa-home"></i>داشبورد</a>
                            </li>
                            <li><a><i class="fa fa-pencil-square"></i> دسته بندی <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('dashboard.category.create') }}"> افزودن </a></li>
                                    <li><a href="{{ route('dashboard.category.list') }}"> لیست </a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-pencil-square"></i> برند <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('dashboard.brand.create') }}"> افزودن </a></li>
                                    <li><a href="{{ route('dashboard.brand.list') }}"> لیست </a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-pencil-square"></i> مشخصات <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('dashboard.spec.create') }}"> افزودن </a></li>
                                    <li><a href="{{ route('dashboard.spec.list') }}"> لیست </a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-pencil-square"></i> محصولات <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('dashboard.product.create') }}"> افزودن </a></li>
                                    <li><a href="{{ route('dashboard.product.list') }}"> لیست </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <style>
                        .counterNewComment{
                            width: 20px;
                            height: 20px;
                            text-align: center;
                            color: white;
                            background-color: red;
                            border-radius: 50%;
                            display: inline-block;
                        }
                    </style>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="خروج" href="{{ route('logout') }}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>
