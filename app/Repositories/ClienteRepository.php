<?php

namespace App\Repositories;

use App\Interfaces\ClienteRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Cliente;

class ClienteRepository implements ClienteRepositoryInterface
{
    private $eloquent;
    private $userRepository;

    public function __construct(Cliente $eloquent, UserRepositoryInterface $userRepository)
    {
        $this->eloquent = $eloquent;
        $this->userRepository = $userRepository;
    }

    private function newEmptyInstance()
    {
        return $this->eloquent->newInstance();
    }

    public function findByCpf($cpf)
    {
        return $this->eloquent->where('cpf',$cpf)->first();
    }

    public function createOrUpdate($request)
    {
        $dataUser = [
            'name' => $request->nome,
            'email' => $request->email,
            'password' => $request->senha
        ];

        $user = $this->userRepository->createOrUpdate($dataUser);

        $cliente = $this->findByCpf($request->email);
        if(!$cliente)
            $cliente = $this->newEmptyInstance();
        $cliente->nome = $request->nome;
        $cliente->nascimento = $request->nascimento;
        $cliente->cpf = $request->cpf;
        $cliente->sexo = $request->sexo;
        $cliente->telefone = $request->telefone;
        $cliente->user_id = $user->id;
        $cliente->save();

    }
}
