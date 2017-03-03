@extends('adminpanel/layout')

@section('adminpanel-content')

	{{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT']) }}
		{{ Form::label('name','Nazwa') }}
		{{ Form::text('name') }}

		{{ Form::label('category','Kategoria') }}
		{{ Form::select('category', $selectedCat, $product->category->id) }}

		{{ Form::label('subcategory','Podkategoria') }}
		{{ Form::select('subcategory', $selectedSub, $product->subcategory->id) }}

		{{ Form::label('brand','Marka') }}
		{{ Form::select('brand', $selectedBrands, $product->brand->id) }}

		{{ Form::label('price','Cena') }}
		{{ Form::text('price') }}

		</br> </br>
		<span>Rozmiary</span>
		</br>

		@foreach($product->sizes as $size)
			{{ Form::label($size->name, $size->name) }}
			{{ Form::text($size->pivot->name, $size->pivot->number) }}
			</br>
		@endforeach

		{{ Form::textarea('description') }}
		
		{{ Form::submit('Zapisz zmiany') }}
		
	{{ Form::close() }}
	
@endsection