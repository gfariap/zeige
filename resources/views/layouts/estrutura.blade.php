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
    <title>Zeige Resultate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
</head>
<body id="app">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('projetos.listar') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Zeige Resultate"/>
            </a>
        </div>
        @if (Auth::user())
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <span class="hidden-xs username">{{ Auth::user()->displayname }}</span>
                        <a class="link-logout" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>

<nav class="navbar navbar-secundaria">
    <div class="container">
        <div class="navbar-left">
            @yield ('breadcrumbs')
            @{{ teste }}
        </div>
        <div class="navbar-right">
            @yield ('acoes')
        </div>
    </div>
</nav>

@yield ('modals')

<div class="conteudo">
    <div class="container">
        @include ('componentes.erros')
        @yield ('content')
    </div>
</div>

<div class="rodape">
    <div class="rodape-interno"></div>
</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@include('sweet::alert')
@yield ('scripts')
</body>
</html>