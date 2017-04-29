@extends('layout')

@section('content')
    
    @if ($errors->any())
        <div class="information-panel error-panel">
            <span>Niepoprawny adres email lub hasło!</span>
        </div>
    @endif 

    <div class="subpanel-container">
        <div class="panel panel-left-align">
            <h1>Logowanie</h1>
            {{ Form::open(['route' => 'login', 'id' => 'form-login', 'class' => 'form-classic']) }}

                <div class="row row-left-align">
                    <i class="icon-user"></i>
                    {{ Form::label('email','Adres email') }}
                </div>

                <div class="row row-left-align">
                    {{ Form::email('email', null, ['placeholder' => 'Podaj adres email...']) }}
                </div>

                <div class="row row-left-align">
                    <i class="icon-lock"></i>
                    {{ Form::label('password','Hasło') }}
                </div>

                <div class="row row-left-align">
                    {{ Form::password('password', null, ['placeholder' => 'Podaj hasło...']) }}
                </div>

                <div class="row row-left-align">
                    {{ Form::submit('Zaloguj') }}
                </div>
                
            {{ Form::close() }}

            <a href="{{url('/password/reset')}}">Nie pamiętasz hasła?</a>
        </div>

        <div class="panel panel-left-align">
            <h1>Rejestracja</h1>
            <p>Nie masz jeszcze konta w naszym sklepie? Załóż się, by dowiedzieć się, co dzięki temu zyskasz :)</p>

            <button class="button-default">
                <a href="{{url('/register')}}">Zarejestruj się</a>
            </button>
            
        </div>
    </div>

    
    

@endsection