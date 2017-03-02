@extends('adminpanel/layout')

@section('deliveriesIndex')
	@if (session('info'))
		{{ session('info') }}
	@endif

	<table>
		<tr>
			<th>Nazwa</th>
			<th>Koszt</th>
		</tr>

		{{ Form::open(['route' => 'deliveries.update', 'method' => 'PUT']) }}
			@foreach ($delivery_methods as $key => $method)
				<tr>
					<td> {{ Form::text('methods_name[]', $method->name ) }} </td>
					<td> {{ Form::text('methods_cost[]', $method->cost ) }} </td>
				
			@endforeach
					<td> {{ Form::submit('Zapisz zmiany') }} </td>
				</tr>
		{{ Form::close() }}
	
		<tr>
		{{ Form::open(['route' => 'deliveries.store', 'method' => 'POST']) }}
			<td> {{ Form::text('name',null, ['placeholder' => 'Wpisz nazwę']) }} </td>

			<td> {{ Form::text('cost',null, ['placeholder' => 'Podaj koszt']) }} </td>

			<td> {{ Form::submit('Dodaj metodę wysyłki') }} </td>
		{{ Form::close() }}
		</tr>
	</table>
@endsection