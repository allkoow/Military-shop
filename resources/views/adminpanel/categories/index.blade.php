@extends('adminpanel/layout')

@section('categoriesIndex')
	@if (session('storeInfo'))
		{{ session('storeInfo') }} </br>
	@endif

		@foreach ($categories as $category)
			{{ Form::open(['route' => ['categories.checkaction', $category->id], 'method' => 'POST'] ) }}

			{{ Form::text('categoryName',$category->name) }} </br>

				@foreach ($category->subcategories as $subcategory)

					{{ Form::text('subcategories[][name]',$subcategory->name) }}
					{{ Form::hidden('class','Subcategory') }} 
					<input type="submit" name="action" value="Usuń" />  </br>

				@endforeach

			{{ Form::text('newSubcategory',null, ['placeholder' => 'Wpisz nazwę']) }} </br>

			<input type="submit" name="action" value="Zapisz zmiany" /> </br> </br>
			{{-- {{ Form::submit('Zapisz zmiany') }} </br> </br> --}}
			{{ Form::close() }}
		@endforeach

	{{ Form::open(['route' => 'categories.storecategory']) }}
		{{ Form::label('newCategory', 'Nowa kategoria: ') }}
		{{ Form::text('newCategory') }}
		{{ Form::submit('Dodaj') }}
	{{ Form::close() }}
@endsection