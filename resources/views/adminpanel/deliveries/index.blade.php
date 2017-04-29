@extends('adminpanel/layout')

@section('adminpanel-content')
	@if (session('information'))
		<div class="information-panel success-panel">
			{{ session('information') }}
		</div>
	@endif
	
	<div class="subpanel-container">
		<h1>Edytuj istniejące metody</h1>
		{{ Form::open(['route' => 'deliveries.update', 'method' => 'PUT', 'class' => 'form-classic']) }}
			<table>
				<tr>
					<th>Nazwa</th>
					<th>Koszt</th>
				</tr>

				@foreach ($delivery_methods as $key => $method)
					<tr>
						<td> {{ Form::text('methods_name[]', $method->name ) }} </td>
						<td> {{ Form::text('methods_cost[]', $method->cost ) }} </td>
					</tr>
				@endforeach
							
			</table>
		<div class="row row-left-align">
			{{ Form::submit('Zapisz zmiany') }}
		</div>
		{{ Form::close() }}
	</div>
	
	<div class="subpanel-container">
		<h1>Dodaj nową metodę</h1>
		{{ Form::open(['route' => 'deliveries.store', 'method' => 'POST', 'class' => 'form-classic']) }}
			<table>
				<tr>
					<th>Nazwa</th>
					<th>Koszt</th>
				</tr>

				<td> {{ Form::text('name',null, ['placeholder' => 'Wpisz nazwę']) }} </td>

				<td> {{ Form::text('cost',null, ['placeholder' => 'Podaj koszt']) }} </td>
		</table>
		<div class="row row-left-align">
			{{ Form::submit('Dodaj') }}
		</div>
		{{ Form::close() }}
	</div>
@endsection