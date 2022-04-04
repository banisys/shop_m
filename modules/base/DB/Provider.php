<?php

namespace Modules\base\DB;
use Modules\base\Models\ModelClass;
use Symfony\Component\HttpFoundation\File\File;

class Provider
{
    public function getPosts()
    {
        $items = ModelClass::where([['status', '=', '0']])->orderBy('id', 'DESC')->paginate(10);
        return $items;
    }

    public function getPost($id)
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
        $description = array(
            'description' => $request->input('description'),
            'summary' => $request->input('summary'),
        );
        $images = array(
            'image' => $request->input('image'),
            'image_summary' => $request->input('image_summary'),
        );

        $path = public_path('upload/images/blog/' . $request->input('title') . '');
        if (!is_dir($path)) {
            mkdir($path);
        }

        foreach ($request->file() as $key => $uploadedFile) {
            $file_name = $uploadedFile->getClientOriginalName();
            $result = $uploadedFile->move($path, $file_name);
            if ($result instanceof File) {
                $images[$key] = $uploadedFile->getClientOriginalName();
            }
        }

        $keyWords = $request->input('keyWords');

        $seo = [
            'seoDescription' => $request->input('seoDescription'),
            'keyWords' => json_encode($keyWords)
        ];

        $data = [
            'title' => $request->input('title'),
            'description' => json_encode($description),
            'images' => json_encode($images),
            'seo' => json_encode($seo)
        ];
        return $data;
    }
}

