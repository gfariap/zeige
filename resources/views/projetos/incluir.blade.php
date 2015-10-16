@extends ('layouts.estrutura')

@section ('breadcrumbs')
    @include ('componentes.breadcrumbs', [ 'links' => [
        'Projetos' => 'projetos.listar',
        'Cadastrar' => ''
    ] ])
@endsection

@section ('content')
    <h1 class="titulo">CADASTRO DE PROJETO</h1>
    <hr/>

    {!! Form::open(['route' => 'projetos.adicionar', 'files' => TRUE, 'class' => 'big-form form-com-divisoria']) !!}
        @include ('projetos.componentes.formulario', ['textoBotao' => 'CADASTRAR PROJETO'])
    {!! Form::close() !!}
@endsection