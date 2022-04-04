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
    <div class="form-group">
        <label for="title">
            عنوان
        </label>
        <input type="text" class="form-control" id="title" name="title"
               value="{{ old('title',isset($item) ? $item->title : '') }}">
    </div>

    @if(isset($parent))
        {{ $parent->title }}
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
    <input name="parent_id" class="category_id" value="{{ isset($item) ? $item->parent_id : '0' }}" type="hidden">
    <script>
        let selectBox = document.querySelector('.select-box');
        let category_id = document.querySelector('.category_id');

        $(document).on("change", ".form-select", function(){
            $(this).nextAll().remove()
            let id = this.value
            fetch('/dashboard/category/categories/'+this.value)
                .then((response) => {
                    return response.text();
                })
                .then((response) => {
                    category_id.value = id;
                    selectBox.insertAdjacentHTML('beforeend', response);
                })
        });
    </script>


    <div class="form-group" style="clear:both;">

        <button type="submit" class="btn btn-info">ارسال</button>

    </div>

</form>
