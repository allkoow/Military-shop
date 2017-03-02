@extends('userpanel.layout')

@section('userpanel-content')
	<div class="userpanel-orders">
		<table>
			<tr>
				<th>ID</th>
				<th>Data</th>
				<th>Status</th>
				<th>Wartość</th>
			</tr>
			@foreach($orders as $order)
			<tr>
				<td>{{$order->id}}</td>
				<td>{{$order->date}}</td>
				<td>{{$order->status}}</td>
				<td>{{$order->value}} zł</td>
			</tr>
			@endforeach
		</table>
	</div>
@stop