<?php

namespace Modules\brand\DB;
use Modules\brand\Models\ModelClass;

class Provider
{
    public function categories($id)
    {
        $model = ModelClass::class;
        $items = $model::where([['status', '=', '0'] , ['parent_id' , '=' , $id]])->orderBy('id', 'ASC')->get();
        return $items;
    }

    public function getAll()
    {
        $items = ModelClass::where([['status', '=', '0']])->orderBy('id', 'ASC')->paginate(10);
        return $items;
    }

    public function getById($id)
    {
        $item = ModelClass::find($id);
        return $item;
    }

    public function store($request)
    {
        $data = $this->changeItem($request);

        $item = ModelClass::create($data);

    }

    public function update($request , $item)
    {
        $data = $this->changeItem($request);

        if($item && $item instanceof ModelClass){
            $item->update($data);
        }
    }

    public function delete($id)
    {
        $data = [
            'status' => 1,
        ];

        $item = ModelClass::find($id);
        if($item && $item instanceof ModelClass){
            $item->update($data);
        }
    }

    /**
     * @param $request
     * @return array
     */
    private function changeItem($request)
    {
        $data = [
            'title' => $request->input('title'),
            'parent_id' => $request->input('parent_id'),
        ];
        return $data;
    }
}

