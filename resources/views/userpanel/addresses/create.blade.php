@extends('userpanel.layout')

@section('userpanel-content')
	@if($errors->any())
		@foreach($errors->all() as $error)
			<div class="userpanel-error">{{$error}}</div>
		@endforeach
	@endif

	{{ Form::open(['route' => 'addresses.store']) }}

		{{ Form::label('name', 'Nazwa') }}
		{{ Form::text('name', null, ['placeholder' => 'Wpisz nazwę adresu...']) }} </br>

		{{ Form::label('city', 'Miejscowość') }}
		{{ Form::text('city', null, ['placeholder' => 'Wpisz nazwę miejscowości...']) }} </br>

		{{ Form::label('street', 'Ulica') }} 
		{{ Form::text('street', null, ['placeholder' => 'Wpisz ulicę...']) }} </br>

		{{ Form::label('housenumber', 'Nr domu') }}
		{{ Form::text('housenumber', null, ['placeholder' => 'Wpisz nr domu...']) }} </br>

		{{ Form::label('apartmentnumber', 'Nr lokalu') }}
		{{ Form::text('apartmentnumber', null, ['placeholder' => 'Wpisz nr lokalu...']) }} </br>

		{{ Form::label('postcode', 'Kod pocztowy') }}
		{{ Form::text('postcode', null, ['placeholder' => 'Wpisz kod pocztowy...']) }} </br>

		{{ Form::submit('Dodaj adres') }}


	{{ Form::close() }}

@endsection