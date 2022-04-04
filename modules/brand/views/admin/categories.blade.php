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
