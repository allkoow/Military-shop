@extends('userpanel.layout')

@section('userpanel-content')
	<div class="userpanel-settings">
		@if($errors->any())
			@foreach($errors->all() as $error)
				<div class="userpanel-error">{{$error}}</div>
			@endforeach
		@endif

		@if(session('changePassword'))
			<div class="userpanel-error">{{session('changePassword')}}</div>
		@endif

		{{ Form::model(Auth::user(),['route' => 'userpanel.information.edit', 'method' => "PUT"]) }}
			{{ Form::label('name', 'Imię') }}
			{{ Form::text('name') }} </br>

			{{ Form::label('surname', 'Imię') }}
			{{ Form::text('surname') }} </br>

			{{ Form::label('phone_number', 'Nr telefonu') }}
			{{ Form::text('phone_number') }} </br>

			{{ Form::submit('Zapisz zmiany') }}
		{{ Form::close() }}

		{{ Form::open(['route' => 'userpanel.password.edit', 'method' => "PUT"]) }}
			{{ Form::text('passwordOld', null, ['placeholder' => 'Podaj stare hasło...']) }} </br>

			{{ Form::text('passwordNew', null, ['placeholder' => 'Podaj nowe hasło...']) }} </br>

			{{ Form::text('passwordRepeat', null, ['placeholder' => 'Powtórz nowe hasło...']) }} </br>

			{{ Form::submit('Zapisz zmiany') }}
		{{ Form::close() }}

	</div>
@stop