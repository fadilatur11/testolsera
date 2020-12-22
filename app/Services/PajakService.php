<?php 

namespace App\Services;

use App\Http\Repositories\PajakRepository;

class PajakService{

    public function __construct()
    {
        $this->repository = new PajakRepository;
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

    public function update($data,$id)
    {
       return $this->repository->update($data,$id);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
?>