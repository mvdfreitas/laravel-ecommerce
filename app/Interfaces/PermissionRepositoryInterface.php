<?php

namespace App\Interfaces;

interface PermissionRepositoryInterface
{
    public function createOrUpdate($request, $id = null);
    public function delete($id);
    public function all($paginate);
    public function findByNome($nome);
    public function findById($id);
}
