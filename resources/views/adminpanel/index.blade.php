@extends('adminpanel/layout')

@section('adminpanel-content')
<div class="subpanel-container">
	<h1>Najnowsze zamówienia</h1>
	@if (count($orders) > 0)
		<table class="table-standard">
			<tr>
				<th>Id</th>
				<th>Data</th>
				<th>Użytkownik</th>
				<th>Wartość</th>
				<th>Status</th>
				<th></th>
				<th></th>
			</tr>
		@foreach($orders as $order)
			<tr>
				<td>{{$order->id}}</td>
				<td>{{$order->created_at}}</td>
				<td>{{$order->user->email}}</td>
				<td>{{$order->value}}</td>
				<td>{{$order->status}}</td>
				<td><a class='link-default link-color-dark' href="/../adminpanel/orders/{{$order->id}}">Szczegóły</a></td>
			</tr>
		@endforeach
		</table>
	@else
		<span>Brak nowych zamówień</span>
	@endif
</div>

@endsection

