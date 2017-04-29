@extends('adminpanel/layout')

@section('ordersIndex')
	@if (count($orders) > 0)
		<table class="table-standard">
			<tr>
				<th>Id</th>
				<th>Data</th>
				<th>Wartość</th>
				<th>Status</th>
				<th></th>
				<th></th>
			</tr>
		@foreach($orders as $order)
			<tr>
				<td>{{$order->id}}</td>
				<td>{{$order->date}}</td>
				<td>{{$order->value}}</td>
				<td>{{$order->status}}</td>
				<td><a class='link-default link-color-dark' href="/../adminpanel/orders/{{$order->id}}">Szczegóły</a></td>
			</tr>
		@endforeach
		</table>
	@else
		<p>Nie złożono jeszcze żadnych zamówień :(</p>
	@endif

	{{$orders->links()}}
@endsection