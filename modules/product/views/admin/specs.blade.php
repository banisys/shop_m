@if(isset($specs[0]))
    @php
        $content = explode(",",$specs[0]->content);
    @endphp
    @foreach($content as $cnt)
        <span>{{ $cnt }}</span>
        <input type="text" class="form-control" style="margin-bottom: 20px; margin-top: 0px;" name="content[]"
               placeholder="{{ old('content', $cnt) }}">
    @endforeach
@endif
