<?php

namespace App\Repositories;

use App\Interfaces\ColaboradorRepositoryInterface;
use App\Models\Colaborador;
use Illuminate\Support\Facades\Hash;

class ColaboradorRepository implements ColaboradorRepositoryInterface
{
    private $eloquent;

    public function __construct(Colaborador $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    private function newEmptyInstance()
    {
        return $this->eloquent->newInstance();
    }

    public function findById($id)
    {
        return $this->eloquent->find($id);
    }

    public function createOrUpdate($request, $id = null)
    {
        $colaborador = $request->id != null ? $this->findById($id) : $this->newEmptyInstance();
        $colaborador->nome = $request->nome;
        $colaborador->email = $request->email;
        $colaborador->password = Hash::make($request->password);
        $colaborador->tipo = $request->tipo;
        $colaborador->save();
    }

    public function delete($id)
    {
        $colaborador = $this->findById($id);
        $colaborador->delete();
    }

    public function all($paginate)
    {
        if($paginate)
            return $this->eloquent->orderBy('nome')->paginate(10);

        return $this->eloquent->orderBy('nome')->get();
    }

    public function findByNome($nome)
    {
        return $this->eloquent->where('nome', 'like', '%'.$nome.'%')->get();
    }

}
