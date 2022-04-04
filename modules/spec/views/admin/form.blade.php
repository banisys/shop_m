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
    <input name="category_id" class="category_id" value="{{ isset($item) ? $item->category->id : '1' }}" type="hidden">
    <script>
        let selectBox = document.querySelector('.select-box');
        let category_id = document.querySelector('.category_id');

        $(document).on("change", ".form-select", function(){
            $(this).nextAll().remove()
            let id = this.value
            fetch('/dashboard/spec/categories/'+this.value)
                .then((response) => {
                    return response.text();
                })
                .then((response) => {
                    category_id.value = id;
                    selectBox.insertAdjacentHTML('beforeend', response);
                })
        });
    </script>

    <style>
        .form-control{
            margin-top: 20px;
        }
        .specsDiv{
            clear: both;
        }
    </style>

    <div class="form-group specsDiv col-lg-4">
    @if(isset($item))
        @php
          $content = explode(",",$item->content);
        @endphp
        @foreach($content as $cnt)
                <input type="text" class="form-control" name="content[]"
                       value="{{ old('content', $cnt) }}"><button type="button" class="btn btn-danger delBtn">حذف</button>
        @endforeach
    @else
            <input type="text" class="form-control" name="content[]"
                   value="{{ old('content') }}"><button type="button" class="btn btn-danger delBtn">حذف</button>
    @endif
    </div>

    <div class="form-group" style="clear:both;">
        <button type="button" class="btn btn-success addSpecBtn">اضافه کردن</button>
    </div>
    <script>
        let specsDiv = document.querySelector('.specsDiv');
        let addSpecBtn = document.querySelector('.addSpecBtn');
        addSpecBtn.addEventListener('click' , function (){
            let newSpec = document.createElement('input')
            let newDelBtn = document.createElement('button')
            newSpec.type = 'text';
            newSpec.className = 'form-control';
            newSpec.name = 'content[]';
            newDelBtn.className = 'btn btn-danger delBtn';
            newDelBtn.type = 'button'
            newDelBtn.textContent = 'حذف'
            specsDiv.append(newSpec)
            specsDiv.append(newDelBtn)
        })

        $(document).on('click' , '.delBtn' , function (){
            this.previousSibling.remove()
            this.remove()
        })
    </script>

    <div class="form-group" style="clear:both;">

        <button type="submit" class="btn btn-info">ارسال</button>

    </div>

</form>
