<?php

namespace App\Services;

use App\Models\Item;
use App\Http\Repositories\ItemRepository;

class ItemService{

    public function __construct()
    {
        $this->repository = new ItemRepository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function create($data)
    {
       return $this->repository->create($data);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update($data, $id)
    {
       return $this->repository->update($data,$id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
?>