<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Colaborador\Auth\ForgotPasswordController;
use App\Http\Controllers\Colaborador\Auth\LoginController;
use App\Http\Controllers\Colaborador\Auth\ResetPasswordController;
use App\Http\Controllers\ColaboradorController;
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
        Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
        //Login Routes
        Route::post('/login',[LoginController::class, 'login'])->name('login.post');
        Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('/password/email',[ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('/password/reset',[ResetPasswordController::class, 'reset'])->name('password.update');

    });

    Route::group(['middleware' => ['auth:colaborador']], function() {
        Route::get('/',[ColaboradorController::class, 'painel'])->name('painel');
    });

    //this route is inside the admin grouped routes
    // Route::get('/home','HomeController@index')->name('home')->middleware('auth:admin');
  });

