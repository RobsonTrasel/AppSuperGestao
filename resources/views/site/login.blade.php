@extends('site.layout.head')

@section('titulo', $title)

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left:auto; margin-right: auto;">
            <div class="contato-principal">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <input type="text" value="{{ old('usuario') }}" name="usuario" placeholder="Usuario" class="borda-preta">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                    <input type="password" value="{{ old('senha') }}" name="senha" placeholder="Senha" class="borda-preta">
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}

                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : ''}}
            </div>
        </div>
    </div>
</div>

<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="img/facebook.png">
        <img src="img/linkedin.png">
        <img src="img/youtube.png">
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(11) 3333-4444</span>
        <br>
        <span>supergestao@dominio.com.br</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="img/mapa.png">
    </div>
</div>

@endsection
