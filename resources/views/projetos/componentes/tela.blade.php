<div class="panel card-tela" v-class="inativo: tela.status == inativo">
    <div class="acoes">
        <a v-if="tela.status == ativo" href="/telas/@{{ tela.id }}" title="Editar Marcadores">
            <i class="icone-pin"></i>
        </a>
        <a v-if="tela.status == inativo" class="disabled" title="Editar Marcadores">
            <i class="icone-pin"></i>
        </a>
        <a class="file-upload-link" data-tela="@{{ tela.id }}" v-class="disabled: tela.status == inativo"><i class="icone-atualizar"></i></a>
        <div class="file-upload-hidden">
            <form method="POST" id="form-imagem-@{{ tela.id }}" action="/telas/@{{ tela.id }}/imagem" accept-charset="UTF-8" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                {!! csrf_field() !!}
                {!! Form::file('file', ['class' => 'form-control', 'data-auto-file-upload', 'id' => 'imagem-@{{ tela.id }}']) !!}
            </form>
        </div>
        <a v-on="click: mudaVisibilidade(tela)" title="@{{ tela.status == ativo ? 'Ocultar Tela' : 'Exibir Tela' }}">
            <i v-class="icone-ocultar: tela.status == ativo, icone-publicar: tela.status == inativo"></i>
        </a>
        <a v-on="click: excluir(tela.id)" title="Excluir Tela"><i class="icone-lixeira"></i></a>
    </div>
    <div class="imagem">
        <img src="/img/telas/@{{ tela.imagem }}"/>
    </div>
    <div class="nome">
        @{{ tela.titulo }}
    </div>
</div>