<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use Exception;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create()
    {
        return view('cliente.create');
    }

    public function save(ClienteRequest $request)
    {
        try{
            $data = $request->all();

            return redirect()->back()->with('success', 'Cadastro realizado com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }
}
