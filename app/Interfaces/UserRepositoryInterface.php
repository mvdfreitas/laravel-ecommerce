<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function createOrUpdate($data);
}
