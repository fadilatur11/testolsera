<?php 

namespace App\Http\Repositories;

use App\Models\Pajak;

class PajakRepository{

    public function __construct()
    {
        $this->model = new Pajak;
    }

    public function index()
    {
        return $this->model->get();
    }

    public function create($data)
    {
        $pajak = $this->model;
        $pajak->nama = $data['nama'];
        $pajak->rate = $data['rate'];

        $pajak->save();
        return $pajak;
    }

    public function show($id)
    {
        return $this->model->where('id',$id);
    }

    public function update($data, $id)
    {
        $pajak = $this->model->findOrFail($id);
        $pajak->nama = $data['nama'];
        $pajak->rate = $data['rate'];
        $pajak->save();
        return $pajak;
    }

    public function destroy($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
?>