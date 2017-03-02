@extends('userpanel.layout')

@section('userpanel-content')
	@if($errors->any())
		@foreach($errors->all() as $error)
			<div class="userpanel-error">{{$error}}</div>
		@endforeach
	@endif

	@if(session('editAddress'))
		<span>{{session('editAddress')}}</span>
	@endif

	{{ Form::model($address, ['route' => ['addresses.update', $address->id], 'method' => 'PUT']) }}
		{{ Form::label('name', 'Nazwa') }}
		{{ Form::text('name') }} </br>

		{{ Form::label('city', 'Miejscowość') }}
		{{ Form::text('city') }}</br>

		{{ Form::label('street', 'Ulica') }}
		{{ Form::text('street') }}</br>

		{{ Form::label('house_number', 'Nr domu') }}
		{{ Form::text('house_number') }}</br>

		{{ Form::label('apartment_number', 'Nr lokalu') }}
		{{ Form::text('apartment_number') }}</br>

		{{ Form::label('postcode', 'Kod pocztowy') }}
		{{ Form::text('postcode') }}</br>

		{{ Form::submit('Zapisz zmiany') }}
	{{ Form::close() }}
@stop