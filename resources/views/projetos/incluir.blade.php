@extends ('layouts.estrutura')

@section ('content')
    <h1 class="titulo">CADASTRO DE PROJETO</h1>
    <hr/>

    <form action="" class="big-form form-com-divisoria">
        <div class="row">
            <div class="col-sm-6 col-md-offset-1 col-md-5 esquerda">
                <div class="form-group">
                    <label for="nome">Nome do Projeto</label>
                    <input id="nome" name="nome" type="text" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="cliente">Nome do Cliente</label>
                    <input id="cliente" name="cliente" type="text" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">E-mail do Cliente</label>
                    <input id="email" name="email" type="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="imagem">Marca do Cliente</label>
                    <input id="imagem" name="imagem" type="file" class="form-control"/>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 direita">
                <div class="form-group">
                    <label for="descricao">Descrição do Projeto</label>
                    <textarea class="form-control big-textarea" name="descricao" id="descricao"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">
                        CADASTRAR PROJETO
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection