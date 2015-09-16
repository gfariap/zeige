@extends ('layouts.estrutura')

@section ('acoes')
    <button class="btn btn-acao">
        Cadastrar Projeto
    </button>
@endsection

@section ('content')
    <h1 class="titulo">PROJETOS ATIVOS</h1>
    <hr/>
    {{ var_dump($ativos) }}

    <h1 class="titulo">PROJETOS INATIVOS</h1>
    <hr/>
    {{ var_dump($inativos) }}
@endsection