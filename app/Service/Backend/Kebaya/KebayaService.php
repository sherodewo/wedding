<?php

namespace App\Http\Services\Backend\Kebaya;

use App\Http\Requests\Backend\Kebaya\CreateKebayaRequest;
use App\Models\Kebaya;

class KebayaService
{
    private $kebaya;

    public function __construct(Kebaya $kebaya)
    {
        $this->kebaya = $kebaya;
    }

    public function storeKebaya(CreateKebayaRequest$request)
    {
        $data = $this->kebaya;
        $data->name = $request->name;
        $data->image = $request->image;

        $data->save();
        return $data;
    }

    public function findById($id)
    {
        $data = $this->kebaya->find($id);
        return $data;
    }

    public function deleteKebaya($id)
    {
        $data = $this->kebaya->find($id);
        $data->delete();
        return $data;
    }
}
