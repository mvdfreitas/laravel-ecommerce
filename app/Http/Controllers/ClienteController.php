<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Interfaces\ClienteRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Exception;

class ClienteController extends Controller
{
    private $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function save(ClienteRequest $request)
    {
        try{
            $this->clienteRepository->createOrUpdate($request);
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }
}
