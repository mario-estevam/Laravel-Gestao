<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $f = new Fornecedor();
        $f->nome = 'Teste2';
        $f->site = 'teste.com.br';
        $f->uf = 'RN';
        $f->email = 'teste@gmail.com';
        $f->save();

        //outra forma (necessário atributo fillable da classe)
        Fornecedor::create(['nome'=>'Teste3', 'site'=>'teste3.com','uf'=>'RN','email'=> 'teste3@teste.com']);

        //insert
        DB::table('fornecedors')->insert([
            'nome'=>'Teste4',
            'site'=>'teste4.com',
            'uf'=>'RN',
            'email'=> 'teste4@teste.com'
        ]);
    }
}
