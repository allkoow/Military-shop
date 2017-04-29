@extends('adminpanel/layout')

@section('adminpanel-content')
	<div class="subpanel-container">
		<h1>Nazwa</h1>
		
	</div>
@stop

{{-- <div class="panel panel-left-align">
	{{ Form::text('categoryName',$category->name) }}
	<input type="submit" name="action" value="Zapisz zmiany" />
</div>
	
<h2>Lista podkategorii</h2>
<div class="panel panel-left-align">
	@foreach ($category->subcategories as $subcategory)
		<div>
			{{ Form::text('subcategories[][name]',$subcategory->name) }}
			{{ Form::hidden('class','Subcategory') }} 
			<input type="submit" name="action" value="Usuń" />
		</div>
	@endforeach

	{{ Form::text('newSubcategory',null, ['placeholder' => 'Wpisz nazwę']) }}
</div> --}}