@extends ('layouts.estrutura')

@section ('acoes')
    <a href="{{ route('projetos.incluir') }}" class="btn btn-acao">
        <i class="icone-cadastrar"></i>
        Cadastrar Projeto
    </a>
@endsection

@section ('content')
    <h1 class="titulo">PROJETOS ATIVOS</h1>
    <hr/>
    <div class="row cards">
    @foreach ($ativos as $ativo)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
            @include ('projetos.card', [ 'projeto' => $ativo ])
        </div>
    @endforeach
    </div>

    <h1 class="titulo">PROJETOS INATIVOS</h1>
    <hr/>
@endsection