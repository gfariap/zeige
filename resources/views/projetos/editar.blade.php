@extends ('layouts.estrutura')

@section ('content')
    <h1 class="titulo">CADASTRO DE PROJETO</h1>
    <hr/>

    <form action="{{ route('projetos.atualizar', [ 'id' => $projeto->id ]) }}" method="POST" class="big-form form-com-divisoria" accept-charset="UTF-8" enctype="multipart/form-data">
        <input type="hidden" value="PUT" name="_method"/>
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-sm-6 col-md-offset-1 col-md-5 esquerda">
                <div class="form-group">
                    <label for="nome">Nome do Projeto</label>
                    <input id="nome" name="nome" type="text" class="form-control" value="{{ $projeto->nome }}"/>
                </div>
                <div class="form-group">
                    <label for="cliente">Nome do Cliente</label>
                    <input id="cliente" name="cliente" type="text" class="form-control" value="{{ $projeto->cliente }}"/>
                </div>
                <div class="form-group">
                    <label for="email">E-mail do Cliente</label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ $projeto->email }}"/>
                </div>
                <div class="form-group">
                    <label for="imagem">Marca do Cliente</label>
                    <input id="imagem" name="imagem" type="file" class="form-control"/>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 direita">
                <div class="form-group">
                    <label for="descricao">Descrição do Projeto</label>
                    <textarea class="form-control big-textarea" name="descricao" id="descricao">{{ $projeto->descricao }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        ATUALIZAR PROJETO
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection