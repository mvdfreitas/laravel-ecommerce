<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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
Route::get('/contato',[ContatoController::class, 'index'])->name('contato.index');
Route::get('/carrinho',[CarrinhoController::class, 'index'])->name('carrinho.index');
Route::get('/login',[UserController::class, 'index'])->name('users.login');

Route::group(['prefix' => 'users'], function() {
    Route::get('/cadastrar',[UserController::class, 'create'])->name('users.create');
});

Route::group(['middleware' => ['auth', 'permission']], function() {

});
