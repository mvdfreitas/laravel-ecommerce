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

    public function all($paginate)
    {
        if($paginate)
            return $this->eloquent->orderBy('nome')->paginate(10);

        return $this->eloquent->orderBy('nome')->get();
    }

    public function createOrUpdate($request, $id = null)
    {
        $categoria = $request->id != null ? $this->findById($id) : $this->newEmptyInstance();
        $categoria->nome = $request->nome;
        $categoria->slug = $request->nome;
        $categoria->categoria_pai_id = $request->categoria_pai_id;
        $categoria->save();
    }

    public function findById($id)
    {
        return $this->eloquent->find($id);
    }

    public function delete($id)
    {
        $categoria = $this->findById($id);
        $categoria->delete();
    }

    public function findByNome($nome)
    {
        return $this->eloquent->where('nome', 'like', '%'.$nome.'%')->get();
    }

}
