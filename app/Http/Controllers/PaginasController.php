<?php

namespace Zeige\Http\Controllers;

use Auth;
use Zeige\Http\Requests;
use Zeige\Http\Requests\LoginFormularioRequest;

class PaginasController extends Controller
{

    /**
     * Exibe o formulário de login do sistema.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('paginas.login');
    }


    /**
     * Realiza o login do usuário no sistema.
     *
     * @param LoginFormularioRequest $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logar(LoginFormularioRequest $request)
    {
        if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password ])) {
            return redirect('/');
        } else {
            return redirect()->back()->withErrors([ 'errors' => 'Usuário e/ou senha inválidos!' ])->withInput();
        }
    }


    /**
     * Realiza o logout do usuário no sistema.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
