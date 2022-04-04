<?php
$direction = session('direction');
?>

<?php
if($direction == "0"){
?>
<style>
    .small_input {
        width: 10%;
        float: right;
    }

    .small_input2 {
        width: 15%;
        float: left;
        margin-left: 5px;
    }

    .big_input {
        width: 85%;
        float: right;
    }

    .big_input2 {
        width: 40%;
        float: right;
    }
</style>
<?php
}else
if($direction == "1"){
?>
<style>
    .small_input {
        width: 10%;
        float: left;
    }

    .small_input2 {
        width: 15%;
        float: right;
        margin-left: 5px;
    }

    .big_input {
        width: 85%;
        float: left;
    }

    .big_input2 {
        width: 40%;
        float: left;
    }
</style>
<?php
}
?>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group big_input2">
        <label for="title">
            عنوان
        </label>
        <input type="text" class="form-control" id="title" name="title"
               value="{{ old('title',isset($item) ? $item->title : '') }}">
    </div>

    <?php
        if(isset($item->description)){
            $description = json_decode($item->description);
        }else{
            $description = "";
        }
    ?>

    <div class="form-group" style="clear:both;">
        <label for="">
            متن خلاصه پست
        </label>
        <textarea class="form-control" id="text1"
                  name="summary">{{ isset($description->summary) ? $description->summary : '' }}</textarea>
    </div>

    <div class="form-group" style="clear:both;">
        <label for="">
            متن اصلی پست
        </label>
        <textarea class="form-control editor" id="text2"
                  name="description">{{ isset($description->description) ? $description->description : '' }}</textarea>
    </div>

    <?php
        if(isset($item)){
            $images = json_decode($item->images);
        }else{
            $images = "";
        }
    ?>

    <div class="form-group" style="clear:both">
        <img style="width: 100px;height: 100px;" id="image_src"
             src="{{ isset($images->image) ? asset('upload/images/blog/'.$item->title.'')."/".$images->image : '' }}" alt=""/>
        <label for="image" id="label_file" class="btn btn-success">
            عکس شاخص
        </label>
        <input type="file" onchange="chImage(this,'image_src');" style="display:none;" id="image" name="image">
        <input type="hidden" name="image" value="{{ isset($images->image) ? $images->image : '' }}">
        <br><br>
        <img style="width: 100px;height: 100px;" id="image_summary_src"
             src="{{ isset($images->image_summary) ? asset('upload/images/blog/'.$item->title.'')."/".$images->image_summary : '' }}" alt=""/>
        <label for="image_summary" id="label_file" class="btn btn-success">
            عکس خلاصه
        </label>
        <input type="file" onchange="chImage(this,'image_summary_src');" style="display:none;" id="image_summary" name="image_summary">
        <input type="hidden" name="image_summary" value="{{ isset($images->image_summary) ? $images->image_summary : '' }}">
    </div>

    <h2>--------------------------------------------- SEO ---------------------------------------------</h2>
    <?php
    if(isset($item) && isset($item->seo)){
        $seo = json_decode($item->seo);
        $keyWords = isset($seo->keyWords) ? json_decode($seo->keyWords) : '';
    }else{
        $seo = '';
        $keyWords = '';
    }
    for ($i = 0 ; $i < 6 ; $i++) {
            ?>
    <input type="text" name="keyWords[]" value="{{ isset($keyWords[$i]) ? $keyWords[$i] : '' }}"/>
    <?php
        }
    ?>
    <br><br>
    <textarea class="form-control" name="seoDescription">{!! isset($seo->seoDescription) ? $seo->seoDescription : '' !!}</textarea>
    <br><br>


    <div class="form-group" style="clear:both;">

        <button type="submit" class="btn btn-info">ارسال</button>

    </div>

    <script>
        function chImage(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+id)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
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
                    /*toolbar: [
                        '/',
                        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike' ] },
                        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
                        /!*
                                    '/',
                        *!/
                        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                        { name: 'document', items: [ 'Source'] },
                    ],*/
                    contentsCss: '{{ asset('Ckeditor/ckeditor3/ckeditor/fonts.css') }}',
                    language: 'fa',
                    removePlugins: 'elementspath'
                });
            });
        });
    </script>

</form>
