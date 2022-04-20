@extends('app.layouts.head')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('site.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('site.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left:auto; margin-right: auto;">
                <form action="{{ route('site.fornecedor.adicionar') }}" method="post">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">
                    @csrf
                    <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta" id="">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" name="site" value="{{ $fornecedor->site ??  old('site') }}" placeholder="Site" class="borda-preta" id="">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    <input type="text" name="UF" value="{{ $fornecedor->UF ?? old('UF') }}" placeholder="UF" class="borda-preta" id="">
                    {{ $errors->has('UF') ? $errors->first('UF') : '' }}
                    <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="Email" class="borda-preta" id="">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
