<h3>fornecedor</h3>

{{-- apenas um comentário --}}

@if(count($fornecedores)>0 && count($fornecedores)<10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores)>10)
    <h3>Existem vários fornecedores cadastrados</h3>
@endif

