<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class loginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuario ou senha nao existem!';
        };
        if($request->get('erro') == 2){
            $erro = 'Necessario realizar login para acessar a pagina!';
        };
        return view('site.login', ['title' => 'Login', 'erro' => $erro]);
    }
    public function auth(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuario (email) é obrigatorio!',
            'senha.required' => 'O campo senha é obrigatorio!'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');


        $user = new User();
        $existe = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($existe->name)){
            session_start();
            $_SESSION['nome'] = $existe->name;
            $_SESSION['email'] = $existe->email;

            return redirect()->route('site.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        };

    }
    public function logout()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
