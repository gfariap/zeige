@extends ('layouts.estrutura')

@section ('acoes')
    <a href="{{ route('projetos.editar', ['id' => $projeto->id]) }}" class="btn btn-acao">
        <i class="icone-editar"></i>
        Editar Projeto
    </a>
@endsection

@section ('content')
    <h1 class="titulo"><strong>{{ $projeto->cliente }}</strong> / {{ $projeto->nome }}</h1>
    <hr/>
@endsection