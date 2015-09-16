@extends ('layouts.estrutura')

@section ('content')
    {{ var_dump(Auth::user()) }}
@endsection