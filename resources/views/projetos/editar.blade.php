@extends ('layouts.estrutura')

@section ('breadcrumbs')
    @include ('componentes.breadcrumbs', [ 'links' => [
        'Projetos' => 'projetos.listar',
        'Editar' => ''
    ] ])
@endsection

@section ('content')
    <h1 class="titulo">CADASTRO DE PROJETO</h1>
    <hr/>

    {!! Form::model($projeto, [ 'method' => 'PUT', 'route' => [ 'projetos.atualizar', $projeto->id ], 'files' => TRUE, 'class' => 'big-form form-com-divisoria' ]) !!}
        @include ('projetos.componentes.formulario', ['textoBotao' => 'ATUALIZAR PROJETO'])
    {!! Form::close() !!}
@endsection