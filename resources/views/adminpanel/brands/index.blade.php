@extends('adminpanel/layout')

@section('brandsIndex')
	@if (session('updateInfo'))
		<span>{{session('updateInfo')}}</span>
	@endif

	@if ($errors->any())
		@foreach ($errors->all() as $error)
			<span>{{$error}}</span>
		@endforeach
	@endif

	@if (session('storeInfo'))
		{{session('storeInfo')}}
	@endif

	{{ Form::open(['route' => 'brands.update', 'method' => 'PUT' ]) }}
		@foreach ($brands as $brand)
			{{ Form::text($brand->id,$brand->name) }} </br>
		@endforeach
		{{ Form::submit('Zapisz zmiany')}}
			
	{{ Form::close() }} </br> </br>

	<span>Dodaj nową markę</span> </br>
	{{ Form::open(['route' => 'brands.store'])}}
		{{ Form::label('newBrand','Nazwa') }}
		{{ Form::text('newBrand','Wpisz nazwę') }}
		{{ Form::submit('Dodaj nową markę') }}
	{{ Form::close() }}

@stop