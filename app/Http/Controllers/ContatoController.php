<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function index()
    {
        return view('contato.index');
    }

    public function send(ContatoRequest $request)
    {
        try{
            $data = $request->all();
            Mail::send('contato.mail', $data, function($message) use($request){
                $message->from($request->email);
                $message->to('mvdfreitas@teste.com');
                $message->subject('Contato - LojaVirtual - E-mail:' . $request->email);
            });
            return redirect()->back()->with('success', 'Mensagem enviada com sucesso.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Opps! Tivemos um erro, tente novamente mais tarde.')->withInput();
        }
    }
}
