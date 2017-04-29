@extends('userpanel.layout')

@section('userpanel-content')
<div class="subpanel-container">
	<h1>Lista produktów</h1>
	<table class='table-default'>
		<tr>
			<th>Id</th>
			<th>Nazwa</th>
			<th>Kategoria</th>
			<th>Marka</th>
			<th>Cena</th>
		</tr>
		
		@foreach($order->products as $product)
			<tr>
				<td>{{$product->id}}</td>
				<td>
					<a href="{{URL::route('products.show',['product' => $product->name])}}">{{$product->name}}</a>
				</td>
				<td>{{$product->category->name}}/{{$product->subcategory->name}}</td>
				<td>{{$product->brand->name}}</td>
				<td>{{$product->price}} zł</td>
			</tr>
		@endforeach
	</table>
</div>

<div class="subpanel-container">
	<h1>Podsumowanie</h1>
	<div class="row row-left-align">
		<strong>Sposób wysyłki: </strong><span>{{$order->delivery->name}}</span>
	</div>
	<div class="row row-left-align">
		<strong>Koszt przesyłki: </strong><span>{{$order->delivery->cost}} zł</span>
	</div>
	<div class="row row-left-align">
		<strong>Wartość zakupów: </strong><span>{{$order->value}} zł</span>
	</div>
	<div class="row row-left-align">
		<strong>Wartość zamówienia: </strong><span>{{$order->value + $order->delivery->cost}} zł</span>
	</div>
</div>

@stop