<div class="panel card-projeto" v-class="inativo: projeto.status == inativo">
    <div class="imagem">
        <img src="/img/logos/@{{ projeto.imagem }}"/>
        <div class="overlay"></div>
        <div class="acoes">
            <a v-if="projeto.status == ativo" href="/projetos/@{{ projeto.id }}" title="Editar Projeto">
                <i class="icone-editar"></i>
            </a>
            <a v-if="projeto.status == inativo" class="disabled" title="Editar Projeto">
                <i class="icone-editar"></i>
            </a>
            <a v-on="click: mudaVisibilidade(projeto)" title="@{{ projeto.status == ativo ? 'Desativar Projeto' : 'Ativar Projeto' }}">
                <i v-class="icone-ocultar: projeto.status == ativo, icone-publicar: projeto.status == inativo"></i>
            </a>
            <a v-if="projeto.status == ativo" title="Favoritar Projeto"><i class="icone-favoritar"></i></a>
            <a v-if="projeto.status == inativo" class="disabled" title="Favoritar Projeto"><i class="icone-favoritar"></i></a>
        </div>
    </div>
    <div class="nome">
        @{{ projeto.nome }}
    </div>
</div>