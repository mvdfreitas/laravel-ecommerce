<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoriaRepositoryInterface;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $categoriaRepository;

    public function __construct(CategoriaRepositoryInterface $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function index()
    {
        $categorias = $this->categoriaRepository->all();
        return view('colaborador.categoria.index', ['categorias' => $categorias]);
    }

    public function create()
    {
        // return view('colaborador.categorias.index');
    }

    public function store(Request $request)
    {
        // return view('colaborador.categorias.index');
    }

    public function edit($id)
    {
        // return view('colaborador.categorias.index');
    }

    public function update(Request $request)
    {
        // return view('colaborador.categorias.index');
    }

    public function delete($id)
    {
        // return view('colaborador.categorias.index');
    }
}
