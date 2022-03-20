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
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
        SiteContato::create($request->all());

    }
}
