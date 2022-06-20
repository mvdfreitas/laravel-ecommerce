<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = new Role();
        $admin->id = 1;
        $admin->slug = 'administrador';
        $admin->name = 'Administrador';
        $admin->description = 'Administrador';
        $admin->save();

        $gerente = new Role();
        $gerente->id = 2;
        $gerente->slug = 'gerente';
        $gerente->name = 'Gerente';
        $gerente->description = 'Gerente';
        $gerente->save();

        $criarCategoria = new Permission();
        $criarCategoria->slug = 'criar-categoria';
        $criarCategoria->name = 'Criar Categoria';
        $criarCategoria->description = 'Criar Categoria';
        $criarCategoria->save();
        $criarCategoria->roles()->attach($admin);

        $editarCategoria = new Permission();
        $editarCategoria->slug = 'editar-categoria';
        $editarCategoria->name = 'Editar Categoria';
        $editarCategoria->description = 'Editar Categoria';
        $editarCategoria->save();
        $editarCategoria->roles()->attach($admin);

        $verCategoria = new Permission();
        $verCategoria->slug = 'ver-categoria';
        $verCategoria->name = 'Visualizar Categoria';
        $verCategoria->description = 'Visualizar Categoria';
        $verCategoria->save();
        $verCategoria->roles()->attach($admin);

        $excluirCategoria = new Permission();
        $excluirCategoria->slug = 'excluir-categoria';
        $excluirCategoria->name = 'Excluir Categoria';
        $excluirCategoria->description = 'Excluir Categoria';
        $excluirCategoria->save();
        $excluirCategoria->roles()->attach($admin);

        $verCategoriaGerente = new Permission();
        $verCategoriaGerente->slug = 'ver-categoria';
        $verCategoriaGerente->name = 'Visualizar Categoria';
        $verCategoriaGerente->description = 'Visualizar Categoria';
        $verCategoriaGerente->save();
        $verCategoriaGerente->roles()->attach($gerente);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('roles')->where('slug', 'administrador')->delete();
        DB::table('roles')->where('slug', 'gerente')->delete();

        DB::table('permissions')->where('slug', 'criar-categoria')->delete();
        DB::table('permissions')->where('slug', 'editar-categoria')->delete();
        DB::table('permissions')->where('slug', 'ver-categoria')->delete();
        DB::table('permissions')->where('slug', 'gereexcluir-categoriante')->delete();
    }
}
