<?php

namespace App\Http\Controllers\Colaborador;

use App\Http\Controllers\Controller;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    private $permissionRepository;
    private $roleRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
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

        $permissions = $this->permissionRepository->all(true);

        session()->forget(['success', 'error']);
        return view('colaborador.permission.index', ['permissions' => $permissions, 'success' => $success, 'error' => $error]);
    }

    public function create()
    {
        $roles = $this->roleRepository->all(false);
        return view('colaborador.permission.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        try{
            $this->permissionRepository->createOrUpdate($request);
            return redirect()->route('colaborador.permission.index')->with('success', 'Cadastro realizado com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->findById($id);
        $permissions = $this->permissionRepository->all(false);
        return view('colaborador.permission.edit', ['permission' => $permission , 'permissions' => $permissions]);
    }

    public function update(Request $request, $id)
    {
        try{
            $this->permissionRepository->createOrUpdate($request, $id);
            return redirect()->route('colaborador.permission.index')->with('success', 'Cadastro atualizado com sucesso.');
        } catch (Exception $ex) {
            dd($ex);
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }

    public function destroy($id)
    {
        try{
            $this->permissionRepository->delete($id);
            return redirect()->route('colaborador.permission.index')->with('success', 'Permissão removida com sucesso.');
        } catch (Exception $ex) {
            return redirect()->route('colaborador.permission.index')->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.');
        }
    }
}
