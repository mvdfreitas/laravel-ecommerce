<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $success = '';
        $error = '';
        if (Session::has('success'))
            $success = Session::get('success');

        if (Session::has('error'))
            $error = Session::get('error');

        $roles = $this->roleRepository->all(true);

        session()->forget(['success', 'error']);
        return view('colaborador.role.index', ['roles' => $roles, 'success' => $success, 'error' => $error]);
    }

    public function create()
    {
        return view('colaborador.role.create');
    }

    public function store(Request $request)
    {
        try{
            $this->roleRepository->createOrUpdate($request);
            return redirect()->back()->with('success', 'Cadastro realizado com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = $this->roleRepository->findById($id);
        return view('colaborador.role.edit', ['role' => $role]);
    }

    public function update(Request $request, $id)
    {
        try{
            $this->roleRepository->createOrUpdate($request, $id);
            return redirect()->back()->with('success', 'Cadastro atualizado com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }

    public function destroy($id)
    {
        try{
            $this->roleRepository->delete($id);
            return redirect()->back()->with('success', 'Perfil removido com sucesso.');
        } catch (Exception $ex) {
            return redirect()->route('colaborador.role.index')->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.');
        }
    }
}
