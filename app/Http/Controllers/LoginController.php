<?php

namespace App\Http\Controllers;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
        $erro = $request->get('erro');

        if ( $erro == 1){
            $erro = 'Usuário ou senha inválidos';
        }

        if ( $erro == 2){
            $erro = 'Necessário login';
        }

        return view('site.login', ['titulo'=>'Login','erro'=>$erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha'=> 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário/email é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras,$feedback);
        print_r($request->all());
        //recuperamos os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password";
        echo "<br>";

        //iniciar o Model User
        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if(isset($usuario->name)) {

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair()
    {
            session_destroy();
            return redirect()->route('site.index');
    }
}
