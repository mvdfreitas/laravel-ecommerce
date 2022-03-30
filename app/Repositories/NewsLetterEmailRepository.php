<?php

namespace App\Repositories;

use App\Interfaces\NewsLetterEmailRepositoryInterface;
use App\Models\NewsLetterEmail;

class NewsLetterEmailRepository implements NewsLetterEmailRepositoryInterface
{
    private $eloquent;

    public function __construct(NewsLetterEmail $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    private function newEmptyInstance()
    {
        return $this->eloquent->newInstance();
    }

    public function findByEmail($email)
    {
        return $this->eloquent->where('email',$email)->first();
    }

    public function createOrUpdate($request)
    {
        $newsLetter = $this->findByEmail($request->email);
        if(!$newsLetter)
            $newsLetter = $this->newEmptyInstance();
        $newsLetter->email = $request->email;
        $newsLetter->save();
    }
}
