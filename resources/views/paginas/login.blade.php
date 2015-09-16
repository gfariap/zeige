@extends ('layouts.estrutura')

@section ('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
            <img src="{{ asset('img/user.png') }}" class="login-user"/>
            <form action="login" method="POST" class="login-form">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" placeholder="Informe seu usuário" id="username" name="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Informe sua senha" id="password" name="password" class="form-control"/>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="ACESSAR"/>
            </form>
        </div>
    </div>
@endsection