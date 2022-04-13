<?php

namespace App\Http\Controllers\Colaborador\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:colaborador')->except('logout');
    }

    public function showLoginForm()
    {
        return view('colaborador.auth.login');
    }

    public function login(Request $request)
    {
        $this->validator($request);

        //attempt login.
        if(Auth::guard('colaborador')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authenticated
            return redirect()
                ->intended(route('colaborador.painel'))
                ->with('status','You are Logged in as colaborador!');
        }

        //Authentication failed
        return $this->loginFailed();
    }

    public function logout()
    {
        Auth::guard('colaborador')->logout();
        return redirect()
            ->route('colaborador.login');
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:colaboradores|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }
}
