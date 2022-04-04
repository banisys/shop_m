@extends('dashboard.home')

@section('content')

    <?php
        $category = 'category';
    ?>

    <div class="form-group select-box">
        <select class="form-select" aria-label="Default select example">
            <option <?= isset($items) ? '' : 'selected' ?> value="0">انتخاب</option>
            @if(isset($items))
                <div class="alert alert-danger">
                    @foreach($items->all() as $it)
                        @if(isset($item))
                            @if($it->id !== $item->id)
                                @if($item->parent_id == $it->id)
                                    <option selected value="{{ $it->id }}">{{ $it->title }}</option>
                                @else
                                    <option value="{{ $it->id }}">{{ $it->title }}</option>
                                @endif
                            @endif
                        @else
                            <option value="{{ $it->id }}">{{ $it->title }}</option>
                        @endif
                    @endforeach
                </div>
            @endif
        </select>
    </div>
    <style>
        .fa{
            font-size: 20px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
    <div>
        <i class="fa fa-trash deleteCategory" id=""></i>
        <a href="" class="editCategory"><i class="fa fa-edit"></i></a>
    </div>
    <script>
        let selectBox = document.querySelector('.select-box');
        let editCategory = document.querySelector('.editCategory');
        let deleteCategory = document.querySelector('.deleteCategory');

        $(document).on("change", ".form-select", function(){
            $(this).nextAll().remove()
            let id = this.value
            fetch('/dashboard/category/categories/'+this.value)
                .then((response) => {
                    return response.text();
                })
                .then((response) => {
                    editCategory.setAttribute('href' , 'edit/'+id);
                    deleteCategory.setAttribute('id' , 'delete/'+id);
                    selectBox.insertAdjacentHTML('beforeend', response);
                })
        });
    </script>



    {{--<p>
        @foreach($items as $item)
            @if($item->parent_id == 0)
                @if ($item->children)
                    @include('CategoryView::admin.catList', ['items' => $item->children])
                @else
                    {{ $item->title }}
                @endif
            @endif
        @endforeach
    </p>--}}


    <script>
        $(document).on('click', '.fa-trash', function () {
            var conf = confirm("مطمئنی میخوای حذفش کنی؟");
            if(conf){
                window.location = $(this).attr("id");
            }
            $('.collapse').collapse()
        });
    </script>

@endsection
