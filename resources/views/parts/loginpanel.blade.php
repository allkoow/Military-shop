<div class="menu-item menu-item-login">
    <i class="icon-user"></i>
    <span>
        @if(Auth::check())
            Witaj, {{Auth::user()->name}}!
        @else
            Zaloguj
        @endif
    </span>
    <div class="bookmark">
        @if(Auth::check())
            <button> <a href="/../logout">Wyloguj</a> </button>
            @if( Auth::user()->hasRole('administrator') )
                <span> <a href="/../adminpanel">Panel administratora</a> </span>
            @else
                <span> <a href="/../userpanel/addresses">Panel użytkownika</a> </span>
            @endif
        @else
            {{ Form::open(['route' => 'login', 'class' => 'form-style', 'id' => 'form-login']) }}

                @if ($errors->has('email'))
                    <strong>Niepoprawny adres email!</strong>
                @endif 
                {{ Form::email('email', null, ['placeholder' => 'Podaj adres email...']) }}


                @if ($errors->has('password'))
                    <strong>Niepoprawne hasło!</strong>
                @endif 
                {{ Form::password('password', null, ['placeholder' => 'Podaj hasło...']) }}

                {{ Form::submit('Zaloguj') }}
            {{ Form::close() }}

            <a href="{{url('/password/reset')}}">Nie pamiętasz hasła?</a>
            <a href="{{url('/register')}}">Zarejestruj się</a>
        @endif
    </div>
</div>