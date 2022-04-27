<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Interfaces\CategoriaRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    private $categoriaRepository;

    public function __construct(CategoriaRepositoryInterface $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function index()
    {
        $success = '';
        $error = '';
        if (Session::has('success'))
            $success = Session::get('success');

        if (Session::has('error'))
            $error = Session::get('error');

        $categorias = $this->categoriaRepository->all(true);

        session()->forget(['success', 'error']);
        return view('colaborador.categoria.index', ['categorias' => $categorias, 'success' => $success, 'error' => $error]);
    }

    public function create()
    {
        $categorias = $this->categoriaRepository->all(false);
        return view('colaborador.categoria.create', ['categorias' => $categorias]);
    }

    public function store(CategoriaRequest $request)
    {
        try{
            $this->categoriaRepository->createOrUpdate($request);
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }

    public function edit($id)
    {
        $categoria = $this->categoriaRepository->findById($id);
        $categorias = $this->categoriaRepository->all(false);
        return view('colaborador.categoria.edit', ['categoria' => $categoria , 'categorias' => $categorias]);
    }

    public function update(CategoriaRequest $request, $id)
    {
        try{
            $this->categoriaRepository->createOrUpdate($request, $id);
            return redirect()->back()->with('success', 'Cadastro atualizdo com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }

    public function delete($id)
    {
        try{
            $this->categoriaRepository->delete($id);
            session()->put('success', 'Categoria removida com sucesso.');
            return response()->json(true);
        } catch (Exception $ex) {
            return redirect()->route('colaborador.categoria.index')->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.');
        }
    }
}
