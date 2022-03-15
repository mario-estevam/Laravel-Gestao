<h3>fornecedor</h3>

@php
// if(!<condição>) {} enquanto o if executa se o retorno for true
// unless executa se o retorno for false
//if(isset($variavel)){} // retorna true se a variável estiver definida
//
@endphp

@isset($fornecedores)
Fornecedor: {{$fornecedores[2]['nome']}}

<br/>
status: {{$fornecedores[2]['status']}}
<br/>
    CNPJ: {{$fornecedores[2]['cnpj'] ?? 'dado não existe'}}
<br/>
    Telefone: ({{ $fornecedores[2]['ddd'] ?? ''}}){{$fornecedores[3]['telefone'] ?? ''}}

@endisset
