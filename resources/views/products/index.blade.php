@extends('layout')

@section('content')
	<div class="products-page">
		{{ Form::open(['route' => 'products.index', 'method' => 'GET']) }}
		
		<div class='subpanel-container filter-container'>
			@if ( Input::get('category') )
				{{ Form::hidden('category',Input::get('category')) }}
			@endif

			@if ( Input::get('subcategory') )
				{{ Form::hidden('subcategory',Input::get('subcategory')) }}
			@endif

			<div class="panel panel-left-align">
				<h2>Cena</h2>
				{{ Form::label('priceMin','od') }}
				{{ Form::text('priceMin',$data['priceMin'],['class' => 'text-default']) }}

				{{ Form::label('priceMax','do') }}
				{{ Form::text('priceMax',$data['priceMax'],['class' => 'text-default']) }}
			</div>

			<div class="panel panel-left-align">
				<h2>Marka</h2>
				@foreach ($brands as $brand)
					{{ Form::checkbox('brandsChecked[]', $brand->id, in_array($brand->id, $brandsChecked), ['id' => $brand->id]) }}
					<label for="{{$brand->id}}"><span></span>{{$brand->name}}</label>
				@endforeach
			</div>
			
			<div class="row row-left-align">
				{{ Form::submit('Filtruj',['class' => 'button-small filter-button']) }}
			</div>
		</div>
		
		{{ Form::close() }}
		
		@include('parts/products-list')
	</div>
@stop