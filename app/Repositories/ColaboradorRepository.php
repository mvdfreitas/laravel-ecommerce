<?php

namespace App\Repositories;

use App\Interfaces\ColaboradorRepositoryInterface;
use App\Models\Colaborador;

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
        return $this->eloquent->find($id)->first();
    }

}
