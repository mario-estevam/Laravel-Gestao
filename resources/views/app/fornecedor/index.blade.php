<h3>fornecedor</h3>

@php
// if(!<condição>) {} enquanto o if executa se o retorno for true
// unless executa se o retorno for false
//if(isset($variavel)){} // retorna true se a variável estiver definida
@endphp

@isset($fornecedores)
Fornecedor: {{$fornecedores[3]['nome']}}
<br/>
status: {{$fornecedores[3]['status']}}
<br/>
@isset($fornecedores[3]['cnpj'])
    CNPJ: {{$fornecedores[3]['cnpj']}}
@endisset

@endisset
