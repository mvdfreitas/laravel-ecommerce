<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Colaborador\Auth\ForgotPasswordController;
use App\Http\Controllers\Colaborador\Auth\LoginController as LoginColaboradorController;
use App\Http\Controllers\Colaborador\Auth\ResetPasswordController;
use App\Http\Controllers\Colaborador\CategoriaController;
use App\Http\Controllers\Colaborador\ColaboradorController;
use App\Http\Controllers\Colaborador\PermissionController;
use App\Http\Controllers\Colaborador\RoleController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Home - pagina inicial
 */
Route::get('/',[HomeController::class, 'index'])->name('home.index');
Route::post('/news-letter-email',[HomeController::class, 'newsLetterEmail'])->name('home.newsLetterEmail');

Route::group(['prefix' => 'cliente'], function() {
    Route::get('/',[ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/salvar-cliente',[ClienteController::class, 'save'])->name('cliente.save');
});

Route::group(['prefix' => 'contato'], function() {
    Route::get('/',[ContatoController::class, 'index'])->name('contato.index');
    Route::post('/send', [ContatoController::class, 'send'])->name('contato.send');
});

Route::get('/carrinho',[CarrinhoController::class, 'index'])->name('carrinho.index');

// Autenticação
Auth::routes();

// Colaborador
Route::prefix('/colaborador')->name('colaborador.')->group(function(){

    Route::namespace('Auth')->group(function(){
        Route::get('/login',[LoginColaboradorController::class, 'showLoginForm'])->name('login');
        //Login Routes
        Route::post('/login',[LoginColaboradorController::class, 'login'])->name('login.post');
        Route::get('/logout',[LoginColaboradorController::class, 'logout'])->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('/password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('/password/reset',[ResetPasswordController::class, 'reset'])->name('password.update');

    });

    Route::group(['middleware' => ['auth:colaborador']], function() {
        Route::get('/',[ColaboradorController::class, 'painel'])->name('painel');

        //Roles - Perfis
        Route::resource('role', RoleController::class);

        //Permission - Permissões
        Route::resource('permission', PermissionController::class);

        //CRUD Categoria
        Route::group(['prefix' => 'categoria'], function() {
            Route::get('/',[CategoriaController::class, 'index'])->name('categoria.index');
            Route::get('/cadastrar',[CategoriaController::class, 'create'])->name('categoria.create');
            Route::post('/salvar',[CategoriaController::class, 'store'])->name('categoria.store');
            Route::get('/editar/{id}',[CategoriaController::class, 'edit'])->name('categoria.edit');
            Route::put('/atualizar/{id}',[CategoriaController::class, 'update'])->name('categoria.update');
            Route::delete('/excluir/{id}',[CategoriaController::class, 'delete'])->name('categoria.delete');
        });

        //CRUD Colaboradores
        Route::group(['prefix' => 'colaboradores'], function() {
            Route::get('/',[ColaboradorController::class, 'index'])->name('colaboradores.index');
            Route::get('/cadastrar',[ColaboradorController::class, 'create'])->name('colaboradores.create');
            Route::post('/salvar',[ColaboradorController::class, 'store'])->name('colaboradores.store');
            Route::get('/editar/{id}',[ColaboradorController::class, 'edit'])->name('colaboradores.edit');
            Route::put('/atualizar/{id}',[ColaboradorController::class, 'update'])->name('colaboradores.update');
            Route::delete('/excluir/{id}',[ColaboradorController::class, 'delete'])->name('colaboradores.delete');
        });
    });

    //this route is inside the admin grouped routes
    // Route::get('/home','HomeController@index')->name('home')->middleware('auth:admin');
  });

