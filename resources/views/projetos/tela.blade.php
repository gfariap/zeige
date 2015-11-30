@extends ('layouts.estrutura')

@section ('breadcrumbs')
    @include ('componentes.breadcrumbs', [ 'links' => [
        'Projetos' => 'projetos.listar',
        $tela->apresentacao->projeto->nome => [ 'projetos.dashboard', $tela->apresentacao->projeto->id ],
        'Marcadores' => ''
    ] ])
@endsection

@section ('content')
    <div id="lista-marcadores" class="{{ strtolower($tela->apresentacao->dispositivo) }}" tela="{{ $tela->id }}">
        <h1 class="titulo"><strong>{{ $tela->apresentacao->dispositivo }}</strong> / {{ $tela->apresentacao->versao }} / <small>{{ $tela->titulo }}</small></h1>
        <div class="checkbox checkbox-action pull-right">
            <label>
                <input type="checkbox" v-on="change: areaUtil"/> Exibir área
            </label>
        </div>
        <div class="imagem-full">
            <img src="{{ asset('img/telas/'.$tela->imagem) }}"/>
            <div class="container container-marcadores" v-on="click: incluiMarcador">
                @foreach ($tela->marcadores as $marcador)
                    <div name="marcador" class="marcador editable-click" data-value="{{ $marcador->descricao }}" data-pk="{{ $marcador->id }}" data-params="{y:{{ $marcador->y }}, x:{{ $marcador->x }}}" style="top: {{ $marcador->y }}px; left: {{ $marcador->x }}px;">+</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection