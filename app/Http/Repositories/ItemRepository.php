<?php

namespace App\Http\Repositories;

use App\Models\Item;

class ItemRepository{

    public function __construct()
    {
        $this->model = new item;
    }

    public function index()
    {
        return $this->model->whereHas('pajak')->with('pajak')->select(['id', 'nama']);
    }

    public function create($data)
    {
        $item = $this->model;
        $item->nama = $data['nama'];
       
        if ($item->save()) {
            $item->pajak()->attach(@$data['pajak_id']);
        }
        return $item;
    }

    public function show($id)
    {
        $data = $this->model->with('pajak')->where('id', $id);
        return $data;
    }

    public function update($data, $id)
    {
        $item = $this->model->findOrFail($id);
        $item->nama = $data['nama'];
        
        if($item->save())
        {
            $item->pajak()->detach();
            $item->pajak()->attach(@$data['pajak_id']);
        }

        return $item;
    }

    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        $data->delete();
        return $data;
    }
}
?>