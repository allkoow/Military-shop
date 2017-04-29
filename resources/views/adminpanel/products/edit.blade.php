@extends('adminpanel/layout')

@section('adminpanel-content')

	{{ Form::model($product, ['route' => ['products.update', $product->id], 'files' => true, 'method' => 'PUT', 'class' => 'form-classic']) }}
		
	<div class="subpanel-container">
		<div class="panel">
			<h1>Podstawowe informacje</h1>
		
			<div class="row row-left-align">{{ Form::label('name','Nazwa') }}</div>
			<div class="row row-left-align">{{ Form::text('name') }}</div>

			<div class="row row-left-align">{{ Form::label('category','Kategoria') }}</div>
			<div class="row row-left-align">{{ Form::select('category', $selectedCat, $product->category->id) }}</div>

			<div class="row row-left-align">{{ Form::label('subcategory','Podkategoria') }}</div>
			<div class="row row-left-align">{{ Form::select('subcategory', $selectedSub, $product->subcategory->id) }}</div>

			<div class="row row-left-align">{{ Form::label('brand','Marka') }}</div>
			<div class="row row-left-align">{{ Form::select('brand', $selectedBrands, $product->brand->id) }}</div>

			<div class="row row-left-align">{{ Form::label('price','Cena') }}</div>
			<div class="row row-left-align">{{ Form::text('price') }}</div>
		</div>

		<div class="panel">
			<h1>Liczba produktów</h1>
			@foreach($product->sizes as $size)
				<div class="row row-left-align">{{ Form::label($size->name, $size->name) }}</div>
				<div class="row row-left-align">{{ Form::number($size->name, $size->pivot->number) }}</div>
			@endforeach
		</div>
	</div>

	<div class="subpanel-container">
		<h1>Dodawanie zdjęć</h1>
		<div class="panel-left-align">
			{{-- <input type="file" id="images" class="input-file" name="images[]" multiple /> --}}
			<input type="file" id="images" name="images[]" multiple />
			{{-- <label for="images">Wybierz pliki</label> --}}
		</div>
	</div>
	
	<div class="subpanel-container">
		<h1>Opis</h1>
		{{ Form::textarea('description') }}
	</div>
		
	{{ Form::submit('Zapisz zmiany') }}
		
	{{ Form::close() }}
	
@endsection