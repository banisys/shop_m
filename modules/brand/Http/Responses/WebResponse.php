<?php


namespace Modules\brand\Http\Responses;


class WebResponse
{
    private $ViewPage = 'BrandView';
    public function showResponse($items)
    {
        return view($this->ViewPage.'::blog-home',compact('items'));
    }

    public function showList($items)
    {
        return view($this->ViewPage.'::admin.list',compact('items'));
    }

    public function showCategories($items)
    {
        return view($this->ViewPage.'::admin.categories',compact('items'));
    }

    public function create($items)
    {
        return view($this->ViewPage.'::admin.create',compact('items'));
    }

    public function edit($items,$item,$parent)
    {
        return view($this->ViewPage.'::admin.edit',compact('items','item', 'parent'));
    }

    public function showSinglePost($item)
    {
        return view($this->ViewPage.'::single-post',compact('item'));
    }
}
