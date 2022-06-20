<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    private $eloquent;

    public function __construct(Role $eloquent)
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
            return $this->eloquent->orderBy('name')->paginate(10);

        return $this->eloquent->orderBy('name')->get();
    }

    public function createOrUpdate($request, $id = null)
    {
        $role = $id != null ? $this->findById($id) : $this->newEmptyInstance();
        $role->name = $request->nome;
        $role->description = $request->description;
        $role->slug = $request->nome;
        $role->save();
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
        return $this->eloquent->where('name', 'like', '%'.$nome.'%')->get();
    }

}
