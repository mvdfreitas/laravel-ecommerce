<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    private $eloquent;

    public function __construct(Permission $eloquent)
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
        $permission = $id != null ? $this->findById($id) : $this->newEmptyInstance();
        $permission->name = $request->nome;
        $permission->slug = $request->nome;
        $permission->description = $request->description;
        $permission->save();
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
