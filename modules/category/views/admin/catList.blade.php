<ul>
    @foreach($items as $item)
        @include('CategoryView::admin.catItem', ['item' => $item])
    @endforeach
</ul>
