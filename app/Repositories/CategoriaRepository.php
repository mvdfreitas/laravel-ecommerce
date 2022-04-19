<?php

namespace App\Repositories;

use App\Interfaces\CategoriaRepositoryInterface;
use App\Models\Categoria;

class CategoriaRepository implements CategoriaRepositoryInterface
{
    private $eloquent;

    public function __construct(Categoria $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    private function newEmptyInstance()
    {
        return $this->eloquent->newInstance();
    }

    public function all()
    {
        return $this->eloquent->all();
    }

    public function createOrUpdate($request)
    {
        $categoria = $request->id > 0 ? $this->findById($request->id) : $this->newEmptyInstance();
        $categoria->nome = $request->nome;
        $categoria->save();
    }

    public function findById($id)
    {
        return $this->eloquent->find($id);
    }

    public function delete($id)
    {
        $categoria = $this->eloquent->findById($id);

        if($categoria){
            $categoria->delete();
            return $categoria;
        }

        return null;

    }

    public function findByNome($nome)
    {
        return $this->eloquent->where('nome', 'like', '%'.$nome.'%')->get();
    }

}
