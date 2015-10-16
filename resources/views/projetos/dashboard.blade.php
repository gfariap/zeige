@extends ('layouts.estrutura')

@section ('breadcrumbs')
    @include ('componentes.breadcrumbs', [ 'links' => [
        'Projetos' => 'projetos.listar',
        'Dashboard' => ''
    ] ])
@endsection

@section ('acoes')
    <a href="{{ route('projetos.editar', ['id' => $projeto->id]) }}" class="btn btn-acao">
        <i class="icone-editar"></i>
        Editar Projeto
    </a>
@endsection

@section ('content')
    <h1 class="titulo"><strong>{{ $projeto->cliente }}</strong> / {{ $projeto->nome }}</h1>
    <hr/>
    <form action="{{ route('projetos.adicionarTelas', $projeto->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="dropzone-telas" class="dropzone big-form">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-xs-12 form-group">
                <div class="dropzone-previews">
                    <div class="dz-default dz-message"><span>Arraste as telas aqui</span></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-3 form-group">
                <select class="form-control" name="dispositivo" id="dispositivo">
                    <option value="desktop">DESKTOP</option>
                    <option value="tablet">TABLET</option>
                    <option value="mobile">MOBILE</option>
                </select>
            </div>
            <div class="col-sm-8 col-md-6 form-group">
                <input id="versao" name="versao" type="text" placeholder="Informe o nome da versão" class="form-control"/>
            </div>
            <div class="col-md-3 text-align-right">
                <button type="submit" class="btn btn-primary">
                    <i class="icone-upload"></i> SUBIR IMAGENS
                </button>
            </div>
        </div>
    </form>
    @foreach ($projeto->apresentacoes as $apresentacao)
        <hr/>
        <h1 class="subtitulo">{{ ucfirst($apresentacao->dispositivo) . ' - ' . $apresentacao->versao }}</h1>
        <div class="row cards">
            @foreach ($apresentacao->telas as $tela)
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 form-group">
                    @include ('projetos.componentes.tela', [ 'tela' => $tela ])
                </div>
            @endforeach
        </div>
    @endforeach
@endsection