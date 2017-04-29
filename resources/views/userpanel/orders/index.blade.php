@extends('userpanel.layout')

@section('userpanel-content')
	@if (count($orders) > 0)
		<table class="table-default">
			<tr>
				<th>ID</th>
				<th>Data</th>
				<th>Status</th>
				<th>Wartość</th>
				<th></th>
			</tr>
			@foreach($orders as $order)
			<tr>
				<td>{{$order->id}}</td>
				<td>{{$order->created_at}}</td>
				<td>{{$order->status}}</td>
				<td>{{$order->value}} zł</td>
				<td>
					<a href="{{URL::route('userpanel.orders.show', ['order' => $order->id])}}">
						<button class="button-small">Szczegóły</button>
					</a>
				</td>
			</tr>
			@endforeach
		</table>
	@else
		<p>Nie złożyłeś jeszcze żadnych zamówień. Może czas to zmienić? :)</p>
	@endif

@stop