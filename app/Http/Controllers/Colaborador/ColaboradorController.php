<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColaboradorRequest;
use App\Interfaces\ColaboradorRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Session;

class ColaboradorController extends Controller
{
    private $colaboradorRepository;

    public function __construct(ColaboradorRepositoryInterface $colaboradorRepository)
    {
        $this->colaboradorRepository = $colaboradorRepository;
    }

    public function painel()
    {
        return view('colaborador.painel');
    }

    public function index()
    {
        $success = '';
        $error = '';
        if (Session::has('success'))
            $success = Session::get('success');

        if (Session::has('error'))
            $error = Session::get('error');

        $colaboradores = $this->colaboradorRepository->all(true);

        session()->forget(['success', 'error']);
        return view('colaborador.colaboradores.index', ['colaboradores' => $colaboradores, 'success' => $success, 'error' => $error]);
    }

    public function create()
    {
        $colaboradores = $this->colaboradorRepository->all(false);
        return view('colaborador.colaboradores.create', ['colaboradores' => $colaboradores]);
    }

    public function store(ColaboradorRequest $request)
    {
        try{
            $this->colaboradorRepository->createOrUpdate($request);
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }

    public function edit($id)
    {
        $colaborador = $this->colaboradorRepository->findById($id);
        return view('colaborador.colaboradores.edit', ['colaborador' => $colaborador]);
    }

    public function update(ColaboradorRequest $request, $id)
    {
        try{
            $this->colaboradorRepository->createOrUpdate($request, $id);
            return redirect()->back()->with('success', 'Cadastro atualizdo com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }

    public function delete($id)
    {
        try{
            $this->colaboradorRepository->delete($id);
            session()->put('success', 'Colaborador removido com sucesso.');
            return response()->json(true);
        } catch (Exception $ex) {
            return redirect()->route('colaborador.categoria.index')->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.');
        }
    }

}
