<?php
$direction = session('direction');
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

    @if(isset($item))
        {{ $item->category->title }}
        <br/>
        <br/>
    @endif

    <div class="form-group select-box">
        <select class="form-select" aria-label="Default select example">
            <option <?= isset($items) ? '' : 'selected' ?> value="0">انتخاب</option>
            @if(isset($items))
                <div class="alert alert-danger">
                    @foreach($items as $it)
                        @if(isset($item))
                            @if($it->id == $item->category_id)
                                <option selected value="{{ $it->id }}">{{ $it->title }}</option>
                            @else
                                <option value="{{ $it->id }}">{{ $it->title }}</option>
                            @endif
                        @else
                            <option value="{{ $it->id }}">{{ $it->title }}</option>
                        @endif
                    @endforeach
                </div>
            @endif
        </select>
    </div>
    <input name="category_id" class="category_id" value="{{ isset($item) ? $item->category->id : '1' }}" type="hidden">

    <div class="form-group specsDiv col-lg-4">
        @if(isset($specs[0]))
            @php
                $content = explode(",",$specs[0]->content);
                $itemSpecs = explode(",",$item->specs);
                $ispc = 0;
            @endphp
            @foreach($content as $cnt)
                <span>{{ $cnt }}</span>
                <input type="text" class="form-control" style="margin-bottom: 20px; margin-top: 0px;" name="content[]"
                       placeholder="{{ old('content', $cnt) }}" value="{{ $itemSpecs[$ispc] }}">
                @php $ispc++ @endphp
            @endforeach
        @endif
    </div>
    <script>
        let selectBox = document.querySelector('.select-box');
        let specsDiv = document.querySelector('.specsDiv');
        let category_id = document.querySelector('.category_id');

        $(document).on("change", ".form-select", function(){
            $(this).nextAll().remove()
            let id = this.value
            fetch('/dashboard/product/categories/'+this.value)
                .then((response) => {
                    return response.text();
                })
                .then((response) => {
                    category_id.value = id;
                    selectBox.insertAdjacentHTML('beforeend', response);
                })

            fetch('/dashboard/product/specs/'+id)
                .then((response) => {
                    return response.text();
                })
                .then((response) => {
                    specsDiv.innerHTML = response;
                })
        });
    </script>

    <style>
        .specsDiv{
            clear: both;
        }
    </style>

    <div class="" style="clear: both; width: 100%; margin-bottom: 20px">
        <select class="brandcls" aria-label="Default select example">
            <option <?= isset($brands) ? '' : 'selected' ?> value="0">انتخاب</option>
            @if(isset($brands))
                <div class="alert alert-danger">
                    @foreach($brands as $brand)
                        @if(isset($item))
                            @if($brand->id == $item->brand_id)
                                <option selected value="{{ $brand->id }}">{{ $brand->title }}</option>
                            @else
                                <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                            @endif
                        @else
                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                        @endif
                    @endforeach
                </div>
            @endif
        </select>
    </div>
    <input name="brand_id" class="brand_id" value="{{ isset($item) ? $item->brand->id : '1' }}" type="hidden">
    <script>
        let brand_id = document.querySelector('.brand_id');
        $(document).on("change", ".brandcls", function(){
            let id = this.value
            brand_id.value = id;
        });
    </script>

    <div class="form-group" style="clear:both;">

        <div class="form-group big_input2">
            <label for="name">
                عنوان
            </label>
            <input type="text" class="form-control" id="title" name="name"
                   value="{{ old('name',isset($item) ? $item->name : '') }}">
        </div>

        <div class="form-group big_input2">
            <label for="price">
                قیمت
            </label>
            <input type="text" class="form-control" id="price" name="price"
                   value="{{ old('price',isset($item) ? $item->price : '') }}">
        </div>

        <div class="form-group big_input2">
            <label for="discount">
                تخفیف
            </label>
            <input type="text" class="form-control" id="discount" name="discount"
                   value="{{ old('discount',isset($item) ? $item->discount : '') }}">
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
                توضیحات
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
                 src="{{ isset($images->image) ? asset('upload/images/product/'.$item->name.'')."/".$images->image : '' }}" alt=""/>
            <label for="image" id="label_file" class="btn btn-success">
                عکس شاخص
            </label>
            <input type="file" onchange="chImage(this,'image_src');" style="display:none;" id="image" name="image">
            <input type="hidden" name="image" value="{{ isset($images->image) ? $images->image : '' }}">
            <br><br>
            <img style="width: 100px;height: 100px;" id="image_summary_src"
                 src="{{ isset($images->image_summary) ? asset('upload/images/product/'.$item->name.'')."/".$images->image_summary : '' }}" alt=""/>
            <label for="image_summary" id="label_file" class="btn btn-success">
                عکس خلاصه
            </label>
            <input type="file" onchange="chImage(this,'image_summary_src');" style="display:none;" id="image_summary" name="image_summary">
            <input type="hidden" name="image_summary" value="{{ isset($images->image_summary) ? $images->image_summary : '' }}">
        </div>

        @if(isset($images->gallery))
            <?php
                $itemGallery = explode(",",$images->gallery);
            ?>
            @foreach($itemGallery as $itemGlry)
                    <img style="width: 100px;height: 100px;" id="{{ $itemGlry }}"
                         src="{{ asset('upload/images/product/'.$item->name.'')."/".$itemGlry }}"/>
            @endforeach
        @endif

        <input type="file" name="gallery[]" multiple>
        <input type="hidden" name="glry" value="{{ isset($images->gallery) ? $images->gallery : '' }}">

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
