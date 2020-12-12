<?php 

namespace App\Services;

use App\Models\Pajak;

class PajakService{

    static function index()
    {
        $data = Pajak::get();
        return $data;
    }

    static function create($data)
    {
        $pajak = new Pajak();
        $pajak->nama = $data['nama'];
        $pajak->rate = $data['rate'];

        $pajak->save();
        return $pajak;
    }

    static function show($id)
    {
        $pajak = Pajak::where('id',$id);
        return $pajak;
    }

    static function update($data,$id)
    {
        $pajak = Pajak::findOrFail($id);
        $pajak->nama = $data['nama'];
        $pajak->rate = $data['rate'];
        $pajak->save();
        return $pajak;
    }

    static function destroy($id)
    {
        $pajak = Pajak::findOrFail($id);
        $pajak->delete();
        return $pajak;
    }
}
?>