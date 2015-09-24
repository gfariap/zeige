<div class="panel card-projeto">
    <div class="imagem">
        <img src="{{ asset('img/logos/'.$projeto->imagem) }}"/>

        <div class="acoes">
            <a href="{{ route('projetos.dashboard', [ 'id' => $projeto->id ]) }}" title="Editar Projeto">
                <i class="icone-editar"></i>
            </a>
            <a href="#"><i class="icone-ocultar"></i></a>
            <a href="#"><i class="icone-favoritar"></i></a>
        </div>
    </div>
    <div class="nome">
        {{ $projeto->nome }}
    </div>
</div>