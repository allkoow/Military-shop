@extends('adminpanel/layout')

@section('productCreate')
	{{ Form::open(['route' => 'products.store']) }}
		
		{{ Form::label('name','Nazwa') }}
		{{ Form::text('name') }}

		{{ Form::label('brand','Marka') }}
		{{ Form::select('brand', $selectedBrands) }}

		{{ Form::label('category','Kategoria') }}
		{{ Form::select('category', $selectedCat) }}

		{{ Form::label('subcategory','Podkategoria') }}
		{{ Form::select('subcategory', $selectedSub) }}

		{{ Form::label('price','Cena') }}
		{{ Form::text('price') }}

		{{ Form::label('sex','Płeć') }}
		{{ Form::select('sex', ['male' => 'mężczyzna', 'female' => 'kobieta', 'unisex' => 'uniwersalny']) }}

		</br>
		{{ Form::label('description','Opis') }}
		</br>
		{{ Form::textarea('description') }}
		
		</br>
		{{ Form::submit('Dodaj nowy produkt') }}

	{{ Form::close() }}
@endsection