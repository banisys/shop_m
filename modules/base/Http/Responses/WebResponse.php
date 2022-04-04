<?php


namespace Modules\base\Http\Responses;


class WebResponse
{
    public function showResponse($items)
    {
        return view('ViewPage::blog-home',compact('items'));
    }

    public function showList($items)
    {
        return view('ViewPage::admin.list',compact('items'));
    }

    public function create()
    {
        return view('ViewPage::admin.create');
    }

    public function edit($item)
    {
        return view('ViewPage::admin.edit',compact('item'));
    }

    public function showSinglePost($item)
    {
        return view('ViewPage::single-post',compact('item'));
    }
}
