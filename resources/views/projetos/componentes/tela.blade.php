<div class="panel card-tela">
    <div class="acoes">
        <a href="#"><i class="icone-pin"></i></a>
        <a href="#"><i class="icone-atualizar"></i></a>
        <a href="#"><i class="icone-ocultar"></i></a>
        <a href="#"><i class="icone-lixeira"></i></a>
    </div>
    <div class="imagem">
        <img src="{{ asset('img/telas/'.$tela->imagem) }}"/>
    </div>
    <div class="nome">
        {{ $tela->titulo }}
    </div>
</div>