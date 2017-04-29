@extends('adminpanel/layout')

@section('adminpanel-content')
	
	@if (session('information'))
		<div class="information-panel success-panel">
			<span>{{session('information')}}</span>
		</div>
	@endif

	@if ($errors->any())
		@foreach ($errors->all() as $error)
			<div class="information-panel error-panel">
				<span>{{$error}}</span>
			</div>
		@endforeach
	@endif
	
	<div class="subpanel-container">
		<h1>Lista marek</h1>
		
		{{ Form::open(['route' => 'brands.update', 'method' => 'PUT', 'class' => 'form-classic' ]) }}
			@foreach ($brands as $brand)
				<div class="row row-left-align">
					{{ Form::text($brand->id,$brand->name) }}
				</div>
			@endforeach
			<div class="row row-left-align">
				{{ Form::submit('Zapisz zmiany')}}
			</div>
				
		{{ Form::close() }}
	</div>

	<div class="subpanel-container">
		<h1>Dodaj nową markę</h1>
	
		{{ Form::open(['route' => 'brands.store', 'class' => 'form-classic'])}}
			<div class="row row-left-align">
				{{ Form::label('newBrand','Nazwa') }}
			</div>
			<div class="row row-left-align">
				{{ Form::text('newBrand', null, ['placeholder' => 'Wpisz nazwę']) }}
			</div>
			<div class="row row-left-align">
				{{ Form::submit('Dodaj nową markę') }}
			</div>
		{{ Form::close() }}
	</div>

@stop