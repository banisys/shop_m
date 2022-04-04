<?php

namespace Modules\product\DB;
use Modules\product\Models\ModelClass;
use Symfony\Component\HttpFoundation\File\File;

class Provider
{
    public function categories($id)
    {
        $model = \Modules\category\Models\ModelClass::class;
        $items = $model::where([['status', '=', '0'] , ['parent_id' , '=' , $id]])->orderBy('id', 'ASC')->get();
        return $items;
    }
    public function brands()
    {
        $model = \Modules\brand\Models\ModelClass::class;
        $items = $model::where([['status', '=', '0']])->orderBy('id', 'ASC')->get();
        return $items;
    }

    public function specs($id)
    {
        $specModel = \Modules\spec\Models\ModelClass::class;
        $specs = $specModel::where([['status', '=', '0'] , ['category_id' , '=' , $id]])->orderBy('id', 'ASC')->get();
        return $specs;
    }

    public function getAll()
    {
        $items = ModelClass::where([['status', '=', '0']])->orderBy('id', 'DESC')->paginate(10);
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

        ModelClass::create($data);
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
        $description = array(
            'description' => $request->input('description'),
        );
        $images = array(
            'image' => $request->input('image'),
            'image_summary' => $request->input('image_summary'),
            'gallery' => ($request->file('gallery')) ? [] : $request->input('glry'),
        );

        $path = public_path('upload/images/product/' . $request->input('name') . '');
        if (!is_dir($path)) {
            mkdir($path);
        }

        if ($request->file('image')){
            $file_name = $request->file('image')->getClientOriginalName();
            $result = $request->file('image')->move($path, $file_name);
            if ($result instanceof File) {
                $images['image'] = $request->file('image')->getClientOriginalName();
            }
        }
        if ($request->file('image_summary')) {
            $file_name = $request->file('image_summary')->getClientOriginalName();
            $result = $request->file('image_summary')->move($path, $file_name);
            if ($result instanceof File) {
                $images['image_summary'] = $request->file('image_summary')->getClientOriginalName();
            }
        }

        if ($request->file('gallery')){
            foreach ($request->file('gallery') as $key => $uploadedFile) {
                $file_name = $uploadedFile->getClientOriginalName();
                $result = $uploadedFile->move($path, $file_name);
                if ($result instanceof File) {
                    $images["gallery"][$key] = $uploadedFile->getClientOriginalName();
                }
            }
            $images["gallery"] = implode("," ,$images["gallery"]);
        }

        $data = [
            'name' => $request->input('name'),
            'description' => json_encode($description),
            'images' => json_encode($images),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'specs' => $request->input('content') ? implode("," ,$request->input('content')) : null,
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
        ];

        return $data;
    }
}

