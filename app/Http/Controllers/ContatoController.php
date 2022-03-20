<?php

namespace App\Http\Controllers;

use App\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request  $request)
    {
        $contato = new SiteContato();
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
        $contato->create($request->all());

        return view('site.contato', ['titulo'=>'Contato']);
    }
}
