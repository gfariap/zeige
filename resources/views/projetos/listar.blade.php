@extends ('layouts.estrutura')

@section ('breadcrumbs')
    @include ('componentes.breadcrumbs', [ 'links' => [
        'Projetos' => ''
    ] ])
@endsection

@section ('acoes')
    <a href="{{ route('projetos.incluir') }}" class="btn btn-acao">
        <i class="icone-cadastrar"></i>
        Cadastrar Projeto
    </a>
@endsection

@section ('content')
    <div id="lista-projetos">
        <h1 class="titulo">PROJETOS ATIVOS</h1>
        <hr/>
        <div class="row cards">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group" v-repeat="projeto in projetos | filterBy ativo in 'status'">
                @include ('projetos.componentes.card')
            </div>
        </div>

        <h1 class="titulo">PROJETOS INATIVOS</h1>
        <hr/>
        <div class="row cards">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group" v-repeat="projeto in projetos | filterBy inativo in 'status'">
                @include ('projetos.componentes.card')
            </div>
        </div>
    </div>
@endsection