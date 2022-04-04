@extends('layout.front')

@section('content')

    <section class="posts text-right" style="margin-top: 80px;direction: rtl">


        <!-- Custom styles for this template -->
        <link href="css/blog-home.css" rel="stylesheet">

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                {{--<h1 class="my-4">Page Heading
                    <small>Secondary Text</small>
                </h1>--}}
                    <h3 class="my-4">
                    </h3>

                 @foreach($items as $item)
                     <?php
                         $description = json_decode($item->description);
                         $images = json_decode($item->images);
                     ?>
                     <!-- Blog Post -->
                         <div class="card mb-4">
                             <img class="card-img-top" style="width: 100%;height: 300px"
                                  src="{{ isset($images->image_summary) ? asset('upload/images/blog/'.$item->title.'')."/".$images->image_summary : 'http://placehold.it/750x300' }}" alt="{{ $item->title }}">
                             <div class="card-body">
                                 <h2 class="card-title">
                                     {{ $item->title }}
                                 </h2>
                                 <p class="card-text">
                                     {{ $description->summary }}
                                 </p>
                                 <a href="{{ route('blog.post',$item->id) }}" class="btn btn-primary float-left">
                                     مطالعه بیشتر
                                      &rarr;
                                 </a>
                             </div>
                             <div class="card-footer text-muted">
                                 {{ $item->created_at }}
                             </div>
                         </div>
                 @endforeach


                    <!-- Pagination -->
                    {{ $items->links() }}
                    {{--<nav aria-label="Page navigation example" style="direction: ltr">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>--}}

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

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </section>
@endsection
