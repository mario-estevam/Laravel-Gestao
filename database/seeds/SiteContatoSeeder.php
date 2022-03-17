<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(00)0000-0000';
        $contato->email = 'contato@gmail.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Bem vindo';
        $contato->save();
    }
}
