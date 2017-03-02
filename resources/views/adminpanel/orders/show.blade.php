@extends('adminpanel/layout')

@section('ordersShow')
	<div class="information-container">
		<h2 class='border-bottom'>Podsumowanie zamówienia</h2>
		<table class='table-standard table-margin-bottom'>
			<tr>
				<th>Wartość</th>
				<th>Status</th>
				<th>Metoda wysyłki</th>
				<th>Koszt wysyłki [zł]</th>
				<th>Łącznie do zapłaty [zł]</th>
			</tr>
			<tr>
				<th>{{$order->value}}</th>
				<th>{{$order->status}}</th>
				<th>{{$order->delivery->name}}</th>
				<th>{{$order->delivery->cost}}</th>
				<th>{{$order->delivery->cost + $order->value}}</th>
			</tr>
		</table>

		<a class='link-default link-color-dark' href="/../adminpanel/orders/{{$order->id}}/edit">Potwierdź wysłanie produktu</a>
	</div>
  
	<div class="information-container">
		<h2 class='border-bottom'>Informacje o kupującym</h2>
		<table class="table-standard">
			<tr>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Numer telefonu</th>
				<th>Adres email</th>
			</tr>
			<tr>
				<td>{{$order->user->name}}</td>
				<td>{{$order->user->surname}}</td>
				<td>{{$order->user->phone_number}}</td>
				<td>{{$order->user->email}}</td>
			</tr>
		</table>
	</div>
	
	<div class="information-container">
		<h2 class='border-bottom'>Adres kupującego</h2>
		<table class="table-standard">
			<tr>
				<th>Miasto</th>
				<th>Ulica</th>
				<th>Nr domu</th>
				<th>Nr lokalu</th>
				<th>Kod pocztowy</th>
			</tr>
			<tr>
				<td>{{$order->user->defaultAddress->city}}</td>
				<td>{{$order->user->defaultAddress->street}}</td>
				<td>{{$order->user->defaultAddress->house_number}}</td>
				<td>{{$order->user->defaultAddress->apartment_number}}</td>
				<td>{{$order->user->defaultAddress->postcode}}</td>
			</tr>
		</table>
	</div>
	
	<div>
		<h2 class='border-bottom'>Produkty</h2>
			<table class='table-standard'>
			<tr>
				<th>Id</th>
				<th>Nazwa</th>
			</tr>
			
			@foreach($order->products as $product)
				<tr>
					<td>{{$product->id}}</td>
					<td>{{$product->name}}</td>
				</tr>
			@endforeach
		</table>
	</div>


@endsection