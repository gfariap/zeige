@extends ('layouts.estrutura')

@section ('breadcrumbs')
    @include ('componentes.breadcrumbs', [ 'links' => [
        'Projetos' => 'projetos.listar',
        $tela->apresentacao->projeto->nome => [ 'projetos.dashboard', $tela->apresentacao->projeto->id ],
        'Marcadores' => ''
    ] ])
@endsection

@section ('content')
    <div id="lista-marcadores">
        <h1 class="titulo"><strong>{{ $tela->apresentacao->projeto->nome }}</strong> / Marcadores / <small>{{ $tela->titulo }}</small></h1>
        <div class="checkbox checkbox-action pull-right">
            <label>
                <input type="checkbox" v-on="change: areaUtil"/> Exibir área
            </label>
        </div>
        <div class="imagem-full">
            <img src="{{ asset('img/telas/'.$tela->imagem) }}"/>
            <div class="container container-marcadores" v-on="click: incluiMarcador"></div>
        </div>
    </div>
@endsection