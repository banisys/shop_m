<!-- ======= Header ======= -->
<form method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
<header id="header" class="fixed-top d-flex align-items-center header-transparent text-right" style="direction: rtl">
    <div class="container d-flex align-items-center">

        <?php
            $images = json_decode($item->images);
            $content = json_decode($item->content);
        ?>

        <div class="logo mx-auto">
            {{--<h1 class="text-light"><a href="{{ route('home') }}"><span>دانباکس</span></a></h1>--}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <label for="logo" id="label_file">
                <img for="logo" id="image_logo" src="{{ isset($images->logo) ? asset('upload/images/home')."/".$images->logo : asset('themes/assets/img/hero-img.png') }}" alt="" class="img-fluid">
            </label>
            <input type="file" onchange="chImage(this,'image_logo');" style="display:none;" name="logo" id="logo">
            <input type="hidden" name="logo" value="{{ isset($images->logo) ? $images->logo : '' }}">
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="{{ route('dashboard.home') }}"><i class="fa fa-home"></i>داشبورد</a>
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
        &nbsp;
        <button type="submit" class="btn btn-info">ثبت تغییرات</button>

    </div>
</header><!-- End Header -->
<style>
    #label_file{
        cursor: pointer;
    }
</style>
<script>
    function chImage(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript" src="{{ asset('Ckeditor/ckeditor3/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('Ckeditor/ckeditor3/ckeditor/adapters/jquery.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $('.editor').each(function(e){
            CKEDITOR.replace( this.id, {
                toolbar: [
                    '/',
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
                    /*
                                '/',
                    */
                    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'document', items: [ 'Source'] },
                    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor'] },
                ],
                contentsCss: '{{ asset('Ckeditor_chat/ckeditor3/ckeditor/fonts.css') }}',
                language: 'fa',
                removePlugins: 'elementspath'
            });
        });
    });
</script>


    @include('Home::admin.modals')

<style>
    .modal-dialog{
        max-width: 80%;
    }
    .fullwidth{
        width: 100%;
    }
</style>
