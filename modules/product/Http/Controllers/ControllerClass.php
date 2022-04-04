<?php


namespace Modules\product\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\product\Facades\ProviderFacade;
use Modules\product\Http\Facades\ResponseFacade;

class ControllerClass extends Controller
{
    private $route = 'product';

    public function categories($id)
    {
        $items = ProviderFacade::categories($id);
        return ResponseFacade::showCategories($items);
    }

    public function specs($id)
    {
        $specs = ProviderFacade::specs($id);
        return ResponseFacade::showSpecs($specs);
    }

    public function all()
    {
        $items = ProviderFacade::getAll();
        return ResponseFacade::showResponse($items);
    }

    public function list()
    {
        $items = ProviderFacade::getAll();
        return ResponseFacade::showList($items);
    }

    public function create()
    {
        $items = ProviderFacade::categories(0);
        $brands = ProviderFacade::brands();
        return ResponseFacade::create($items, $brands);
    }

    public function store(Request $request)
    {
        ProviderFacade::store($request);
        return redirect()->route('dashboard.'.$this->route.'.list');
    }

    public function edit($id)
    {
        $items = ProviderFacade::categories(0);
        $brands = ProviderFacade::brands();
        $item = ProviderFacade::getById($id);
        $specs = ProviderFacade::specs($item->category->id);
        return ResponseFacade::edit($items,$item,$brands,$specs);
    }

    public function update(Request $request,$id)
    {
        $item = ProviderFacade::getById($id);
        ProviderFacade::update($request,$item);
        return redirect()->route('dashboard.'.$this->route.'.edit',$id);
    }

    public function delete($id)
    {
        ProviderFacade::delete($id);
        return redirect()->route('dashboard.'.$this->route.'.list');
    }

    public function byId($id)
    {
        $item = ProviderFacade::getById($id);
        return ResponseFacade::showSinglePost($item);
    }

}
