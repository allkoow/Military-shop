@extends('userpanel.layout')

@section('userpanel-content')
		@if($errors->any())
			@foreach($errors->all() as $error)
				<div class="information-panel error-panel">{{$error}}</div>
			@endforeach
		@endif

		@if(session('changePassword'))
			<div class="information-panel error-panel">{{session('changePassword')}}</div>
		@endif

		<div class="subpanel-container">
			<div class="panel">
				<h1>Dane osobowe</h1>
				{{ Form::model(Auth::user(),['route' => 'userpanel.information.edit', 'method' => "PUT", 'class' => 'form-classic left-align form-max-width']) }}
					<div class="row">{{ Form::label('name','Imię') }} </div>
					<div class="row"> {{ Form::text('name') }} </div>
					
					<div class="row">{{ Form::label('surname','Nazwisko') }} </div>
					<div class="row"> {{ Form::text('surname') }} </div>
					
					<div class="row">{{ Form::label('phone_number', 'Nr telefonu') }} </div>
					<div class="row"> {{ Form::text('phone_number') }} </div>

					<div class="row"> {{ Form::submit('Zapisz zmiany') }} </div>
				{{ Form::close() }}
			</div>
			
			<div class="panel">
				<h1>Zmiana hasła</h1>
				{{ Form::open(['route' => 'userpanel.password.edit', 'method' => "PUT", 'class' => 'form-classic left-align form-max-width']) }}
					<div class="row">{{ Form::label('passwordOld','Stare hasło') }} </div>
					<div class="row"> {{ Form::password('passwordOld') }}</div>
					
					<div class="row">{{ Form::label('passwordNew', 'Nowe hasło') }}</div>
					<div class="row"> {{ Form::password('passwordNew') }}</div>

					<div class="row">{{ Form::label('passwordRepeat', 'Powótrz nowe hasło') }}</div>
					<div class="row"> {{ Form::password('passwordRepeat') }}</div>
					
					<div class="row"> {{ Form::submit('Zapisz zmiany') }}</div>
				{{ Form::close() }}
			</div>
		</div>

	</div>
@stop