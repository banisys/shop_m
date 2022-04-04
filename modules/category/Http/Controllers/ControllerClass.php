<?php


namespace Modules\category\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\category\Facades\ProviderFacade;
use Modules\category\Http\Facades\ResponseFacade;

class ControllerClass extends Controller
{
    private $category = 'category';

    public function categories($id)
    {
        $items = ProviderFacade::categories($id);
        return ResponseFacade::showCategories($items);
    }

    public function all()
    {
        $items = ProviderFacade::getAll();
        return ResponseFacade::showResponse($items);
    }

    public function list()
    {
        $items = ProviderFacade::categories(0);
        return ResponseFacade::showList($items);
    }

    public function create()
    {
        $items = ProviderFacade::categories(0);
        return ResponseFacade::create($items);
    }

    public function store(Request $request)
    {
        ProviderFacade::store($request);
        return redirect()->route('dashboard.'.$this->category.'.list');
    }

    public function edit($id)
    {
        $items = ProviderFacade::categories(0);
        $item = ProviderFacade::getById($id);
        $parent = ProviderFacade::getById($item->parent_id);
        return ResponseFacade::edit($items,$item,$parent);
    }

    public function update(Request $request,$id)
    {
        $item = ProviderFacade::getById($id);
        ProviderFacade::update($request,$item);
        return redirect()->route('dashboard.'.$this->category.'.edit',$id);
    }

    public function delete($id)
    {
        ProviderFacade::delete($id);
        return redirect()->route('dashboard.'.$this->category.'.list');
    }

    public function byId($id)
    {
        $item = ProviderFacade::getById($id);
        return ResponseFacade::showSinglePost($item);
    }

}
