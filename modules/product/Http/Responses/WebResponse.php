<?php


namespace Modules\product\Http\Responses;


class WebResponse
{
    private $ViewPage = 'ProductView';
    public function showResponse($items)
    {
        return view($this->ViewPage.'::blog-home',compact('items'));
    }

    public function showCategories($items)
    {
        return view($this->ViewPage.'::admin.categories',compact('items'));
    }

    public function showSpecs($specs)
    {
        return view($this->ViewPage.'::admin.specs',compact('specs'));
    }

    public function showList($items)
    {
        return view($this->ViewPage.'::admin.list',compact('items'));
    }

    public function create($items, $brands)
    {
        return view($this->ViewPage.'::admin.create',compact('items', 'brands'));
    }

    public function edit($items, $item, $brands, $specs)
    {
        return view($this->ViewPage.'::admin.edit',compact('items','item', 'brands', 'specs'));
    }

    public function showSinglePost($item)
    {
        return view($this->ViewPage.'::single-post',compact('item'));
    }
}
