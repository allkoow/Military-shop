@extends('adminpanel/layout')

@section('adminpanel-content')
	@if (session('information'))
		<div class="information-panel success-panel">
			{{ session('information') }}
		</div>
	@endif
	
	<div class="subpanel-container">
		<h1>Lista kategorii</h1>
		
		<table class="table-default">
			<tr>
				<th>Id</th>
				<th>Nazwa</th>
				<th></th>
				<th></th>
			</tr>
			
			@foreach ($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				<td>
					<a href="{{ URL::route('categories.edit', ['id' => $category->id]) }}">
						<button class="button-table">Edytuj</button>
					</a>
				</td>
				<td>
					{{Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE'])}}
						{{Form::submit('Usuń',['class' => 'button-table'])}}
					{{Form::close()}}
				</td>
			</tr>
			@endforeach
		</table>
	</div>

	<div class="subpanel-container">
		<h1>Dodaj nową kategorię</h1>
		<a href="{{ URL::route('categories.create') }}">
			<div class="row row-left-align">
				<button class="button-default">Dodaj</button>
			</div>
		</a>
	</div>

@endsection

