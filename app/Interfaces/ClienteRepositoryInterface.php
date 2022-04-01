<?php

namespace App\Interfaces;

interface ClienteRepositoryInterface
{
    public function findByCpf($cpf);
    public function createOrUpdate($request);
}
