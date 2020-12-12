<?php

namespace App\Services;

use App\Models\Item;

class ItemService{

    static function index()
    {
        $item = Item::whereHas('pajak')->with('pajak')->select(['id', 'nama']);
        return $item;
    }

    static function create($data)
    {
        $item = new Item();
        $item->nama = $data['nama'];
        $item->save();

        return $item;
    }

    static function show($id)
    {
        $data = Item::with('pajak')->where('id', $id);
        return $data;
    }

    static function update($data, $id)
    {
        $item = Item::findOrFail($id);
        $item->nama = $data['nama'];
        
        if($item->save())
        {
            $item->pajak()->detach();
            $item->pajak()->attach($data['pajak_id']);
        }

        return $item;
    }

    static function destroy($id)
    {
        $data = Item::findOrFail($id);
        $data->delete();
        return $data;
    }
}
?>