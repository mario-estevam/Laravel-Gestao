<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome"   value="{{old('nome')}}"  type="text" placeholder="Nome" class="{{$classe}}">
    @if($errors->has('nome'))
        {{$errors->first('nome')}}
    @endif
    <br>
    <input name="telefone" value="{{old('telefone')}}" type="text" placeholder="Telefone" class="{{$classe}}">
    @if($errors->has('telefone'))
        {{$errors->first('telefone')}}
    @endif
    <br>
    <input name="email" value="{{old('email')}}" type="text" placeholder="E-mail" class="{{$classe}}">
    @if($errors->has('email'))
        {{$errors->first('email')}}
    @endif
    <br>

    <select name="motivo_contatos_id" class="{{ $classe }}">

        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contato as $key => $motivos_contatos)
            <option value="{{$motivos_contatos->id}}" {{ old('motivo_contatos_id') == $motivos_contatos->id ? 'selected' : '' }}>{{$motivos_contatos->motivo_contato}}</option>
        @endforeach
    </select>
    @if($errors->has('motivo_contatos_id'))
        {{$errors->first('motivo_contatos_id')}}
    @endif
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
