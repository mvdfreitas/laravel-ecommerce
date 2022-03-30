<?php

namespace App\Interfaces;

interface NewsLetterEmailRepositoryInterface
{
    public function createOrUpdate($request);
    public function findByEmail($email);
}
