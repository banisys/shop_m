@extends('layout.front')

@section('content')
    <section class="posts text-right" style="margin-top: 80px;direction: rtl">

        <?php
            $description = json_decode($item->description);
            $images = json_decode($item->images);
        ?>

        <!-- Custom styles for this template -->
        <link href="css/blog-post.css" rel="stylesheet">

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-8">

                    <!-- Title -->
                    <h1 class="mt-4">
                        {{ $item->title }}
                    </h1>

                    <!-- Author -->
                    <p class="lead">
                        {{--by
                        <a href="#">Start Bootstrap</a>--}}
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p>
                        {{ $item->created_at }}
                    </p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-fluid rounded" style="width: 100%;height: 300px"
                         src="{{ isset($images->image) ? asset('upload/images/blog/'.$item->title.'')."/".$images->image : 'http://placehold.it/900x300' }}" alt="">

                    <hr>

                    <!-- Post Content -->
                    <div style="overflow: auto">
                        {!! $description->description  !!}
                    </div>

                    <hr>

                    @include('Comment::comment')

                </div>

                <!-- Sidebar Widgets Column -->
                <div class="col-md-4">

                    <!-- Search Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">جستجو</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="دنبال چی میگردی؟">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="button">برو!</button>
                                  </span>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">یچیزی</h5>
                        <div class="card-body">
                            {{--<div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#">Web Design</a>
                                        </li>
                                        <li>
                                            <a href="#">HTML</a>
                                        </li>
                                        <li>
                                            <a href="#">Freebies</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#">JavaScript</a>
                                        </li>
                                        <li>
                                            <a href="#">CSS</a>
                                        </li>
                                        <li>
                                            <a href="#">Tutorials</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>--}}
                        </div>
                    </div>

                    <!-- Side Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">یچیزی</h5>
                        <div class="card-body">
                            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                        </div>
                    </div>

                </div>


            </div>
            <!-- /.row -->

        </div>

            <style>
                .input-group>.input-group-append>.btn, .input-group>.input-group-append>.input-group-text, .input-group>.input-group-prepend:first-child>.btn:not(:first-child), .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child), .input-group>.input-group-prepend:not(:first-child)>.btn, .input-group>.input-group-prepend:not(:first-child)>.input-group-text{
                    border-top-right-radius:0;
                    border-bottom-right-radius:0;
                    border-top-left-radius:3px;
                    border-bottom-left-radius:3px;
                }
                .input-group>.custom-select:not(:last-child), .input-group>.form-control:not(:last-child){
                    border-top-left-radius:0;
                    border-bottom-left-radius:0;
                    border-top-right-radius:3px;
                    border-bottom-right-radius:3px;
                }
            </style>

        <!-- /.container -->
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </section>
@endsection
