<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
Route::get('/login',[LoginController::class, 'index'])->name('login.index');

Route::group(['prefix' => 'users'], function() {

});

Route::group(['middleware' => ['auth', 'permission']], function() {

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
