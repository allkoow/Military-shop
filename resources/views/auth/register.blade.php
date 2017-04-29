@extends('layout')

@section('content')
<div class="container">

    @if ($errors->has('email'))
        <div class="information-panel error-panel">
            <strong>Niepoprawny adres email!</strong>
        </div>
    @endif 

    @if ($errors->has('email'))
        <div class="information-panel error-panel">
            <strong>Niepoprawny adres email!</strong>
        </div>
    @endif

    @if ($errors->has('password'))
        <div class="information-panel error-panel">
            <strong>Coś nie tak z hasłem!</strong>
        </div>
    @endif

    <div class="subpanel-container">
        <div class="panel panel-left-align">
            {{ Form::open(['route' => 'register', 'id' => 'form-login', 'class' => 'form-classic']) }}
                <div class="row row-left-align">
                    {{ Form::label('email','Adres email') }}
                </div>

                <div class="row row-left-align">
                    {{ Form::email('email', old('email'), ['required', 'placeholder' => 'Podaj adres email...']) }}
                </div>

                <div class="row row-left-align">
                    {{ Form::label('name','Imię') }}
                </div>

                <div class="row row-left-align">
                    {{ Form::text('name', old('name'), ['required', 'placeholder' => 'Podaj imię...']) }}
                </div>

                <div class="row row-left-align">
                    {{ Form::label('surname','Nazwisko') }}
                </div>

                <div class="row row-left-align">
                    {{ Form::text('surname', old('surname'), ['required', 'placeholder' => 'Podaj nazwisko...']) }}
                </div>

                <div class="row row-left-align">
                    {{ Form::label('password','Hasło') }}
                </div>

                <div class="row row-left-align">
                    {{ Form::password('password',['required']) }}
                </div>

                <div class="row row-left-align">
                    {{ Form::label('password_confirmation','Hasło') }}
                </div>

                <div class="row row-left-align">
                    {{ Form::password('password_confirmation',['required']) }}
                </div>

                <div class="row row-left-align">
                    {{ Form::submit('Zarejestruj') }}
                </div>

            {{ Form::close() }}
        </div>
    </div>


                        {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form> --}}
   
@endsection
