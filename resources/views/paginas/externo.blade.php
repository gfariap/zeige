<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="pt-br" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <title>Zeige Resultate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<div class="pagina-externa" id="pagina-externa" principal="{{ $principal }}" codigo="{{ $projeto->codigo }}">
    <div class="preview" v-class="com-imagem: atual != null, desktop: dispositivo == 'desktop', tablet: dispositivo == 'tablet', mobile: dispositivo == 'mobile'">
        <div class="frame">
            <div class="imagem-full">
                <img v-attr="src: '/img/telas/' + atual.imagem"/>
                <div class="container container-marcadores">
                    <div class="marcador" v-repeat="marcador in atual.marcadores" v-style="top: marcador.y + 'px', left: marcador.x + 'px'" data-toggle="popover" data-content="@{{ marcador.descricao }}">+</div>
                </div>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="container">
            <div class="marca">
                <img src="{{ asset('img/logo.png') }}" alt="Zeige Resultate"/>
            </div>

            <div class="info">
                <div class="cliente">
                    <img src="{{ asset('img/logos/'.$projeto->imagem) }}" alt="{{ $projeto->cliente }}"/>
                </div>

                <div class="telas form-inline">
                    <div class="form-group">
                        <label for="versao">Versão:</label>
                        <select name="versao" id="versao" class="form-control" v-model="apresentacao" options="apresentacoes" v-on="change: buscarTelas(apresentacao)">
                            <option value="0">Selecione a versão<option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tela">Tela:</label>
                        <select name="tela" id="tela" class="form-control" v-model="tela" options="telas" v-on="change: telaAtual(tela)">
                            <option value="0">Selecione a tela</option>
                        </select>
                    </div>
                </div>

                <div class="dispositivos">
                    @if ($projeto->desktop()->count())
                        <a href="#" title="Desktop" v-class="active: dispositivo == 'desktop'" v-on="click: buscarApresentacoes('desktop')"><i class="icone-desktop"></i></a>
                    @endif
                    @if ($projeto->tablet()->count())
                        <a href="#" title="Tablet" v-class="active: dispositivo == 'tablet'" v-on="click: buscarApresentacoes('tablet')"><i class="icone-tablet"></i></a>
                    @endif
                    @if ($projeto->mobile()->count())
                        <a href="#" title="Mobile" v-class="active: dispositivo == 'mobile'" v-on="click: buscarApresentacoes('mobile')"><i class="icone-mobile"></i></a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>