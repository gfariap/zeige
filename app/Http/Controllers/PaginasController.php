<?php

namespace Zeige\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Zeige\Http\Requests;

class PaginasController extends Controller
{

    public function login()
    {
        return view('paginas.login');
    }


    public function logar(Request $request)
    {
        if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password ])) {
            return redirect('/');
        } else {
            return redirect()->back()->withErrors([ 'errors' => 'Usuário e/ou senha inválidos!' ])->withInput();
        }
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
