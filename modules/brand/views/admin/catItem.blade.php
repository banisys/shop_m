<li>
    {{ $item->title }}
    @if ($item->children)
        @include('CategoryView::admin.catList', ['items' => $item->children])
    @endif
</li>
