<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request  $request)
    {

        $motivo_contato = MotivoContato::all();

        //$contato = new SiteContato();
        /*
         * podemos obter e persistir os dados assim
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
         $contato->save();
        */

        // ou dessa maneira mais enxuta
       // $contato->create($request->all());

        return view('site.contato', ['titulo'=>'Contato', 'motivo_contato'=>$motivo_contato]);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|unique:site_contatos',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ],
            [
                'nome.required'=>'O campo nome é requerido',
                'nome.min'=>'O campo nome tem que ter no minimo 3 caracteres',
                'nome.max'=>'O campo nome tem que ter no maximo 40 caracteres',
                'telefone.required'=>'O campo telefone é requerido',
                'telefone.unique'=>'Este telefone já foi cadastrado no sistema',
                'email.email'=>'Insira um email válido',
                'motivo_contatos_id.required'  => 'Insira um motivo para contato',
                'mensagem.required'=>'O campo mensagem tem que ter no máximo 2000 caracteres'

                //'required' => 'O campo :attribute deve ser preenchido'
            ]

        );
        SiteContato::create($request->all());
        return redirect()->route('site.index');

    }
}
