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

<div class="pagina-externa">
    <div class="preview">

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
                        <select name="versao" id="versao" class="form-control">
                            <option value="1">Versão 1</option>
                            <option value="2">Versão 2</option>
                            <option value="3">Versão 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tela">Tela:</label>
                        <select name="tela" id="tela" class="form-control">
                            <option value="1">Tela 1</option>
                            <option value="2">Tela 2</option>
                            <option value="3">Tela 3</option>
                        </select>
                    </div>
                </div>

                <div class="dispositivos">
                    <a href="#" title="Desktop"><i class="icone-desktop"></i></a>
                    <a href="#" title="Tablet"><i class="icone-tablet"></i></a>
                    <a href="#" title="Mobile"><i class="icone-mobile"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>