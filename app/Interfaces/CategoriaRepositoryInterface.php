<?php

namespace App\Interfaces;

interface CategoriaRepositoryInterface
{
    public function createOrUpdate($request);
    public function delete($id);
    public function all();
    public function findByNome($nome);
    public function findById($id);
}
