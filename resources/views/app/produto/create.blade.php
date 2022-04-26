@extends('app.layouts.head')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right: auto;">
                <form method="POST" action="{{ route('produto.store') }}">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}"  placeholder="Nome" class="borda-preta" id="">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="descrição" value="{{ old('descrição') }}"  placeholder="Descricao" class="borda-preta" id="">
                    {{ $errors->has('descrição') ? $errors->first('descrição') : '' }}

                    <input type="text" name="peso" value="{{ old('peso') }}" placeholder="Peso" class="borda-preta" id="">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    <select name="unidade_id">
                        <option>-- Adicione a UNIDADE --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : ''}} >{{ $unidade->descrição }}</option>
                        @endforeach

                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
