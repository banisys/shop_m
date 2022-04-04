<?php


namespace Modules\base\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\base\Facades\ProviderFacade;
use Modules\base\Http\Facades\ResponseFacade;

class ControllerClass extends Controller
{
    public function posts()
    {
        $items = ProviderFacade::getPosts();
        return ResponseFacade::showResponse($items);
    }

    public function list()
    {
        $items = ProviderFacade::getPosts();
        return ResponseFacade::showList($items);
    }

    public function create()
    {
        return ResponseFacade::create();
    }

    public function store(Request $request)
    {
        ProviderFacade::store($request);
        return redirect()->route('dashboard.blog.list');
    }

    public function edit($id)
    {
        $item = ProviderFacade::getPost($id);
        return ResponseFacade::edit($item);
    }

    public function update(Request $request,$id)
    {
        $item = ProviderFacade::getPost($id);
        ProviderFacade::update($request,$item);
        return redirect()->route('dashboard.blog.edit',$id);
    }

    public function delete($id)
    {
        ProviderFacade::delete($id);
        return redirect()->route('dashboard.blog.list');
    }

    public function post($id)
    {
        $item = ProviderFacade::getPost($id);
        return ResponseFacade::showSinglePost($item);
    }

}
