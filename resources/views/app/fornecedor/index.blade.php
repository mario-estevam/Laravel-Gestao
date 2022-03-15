<h3>fornecedor</h3>

@php
// if(!<condição>) {} enquanto o if executa se o retorno for true
// unless executa se o retorno for false
@endphp

Fornecedor: {{$fornecedores[0]['nome']}}
<br/>
status: {{$fornecedores[0]['status']}}
<br/>
@if( !($fornecedores[0]['status']=='S'))
        Fornecedor inativo
@endif
<br/>
@unless($fornecedores[0]['status']=='S') {{--Forma mais limpa ao invés de usar o ! para negar condição do if --}}
    Fornecedor inativo
@endunless
