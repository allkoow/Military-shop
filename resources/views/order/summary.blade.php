@extends('layout')

@section('content')

<div class="subpanel-container">
	<h1>Podsumowanie</h1>
	<div class="panel">
		<table class="table-default">
			<tr>
	            <th>Nazwa</th>
	            <th>Cena za szt.</th>
	            <th>Liczba sztuk</th>
	            <th>Cena</th>
	    	</tr>

	    	@foreach ($cart->items as $item)
	        <tr>
	            <td>
	                {{ $item['name']}}

	                @if( $item['size'] != 'nie dotyczy')
	                    {{ $item['size'] }}
	                @endif
	            
	            </td>

	            <td>{{ $item['price'] }} zł</td>
				<td>{{ $item['quantity'] }}</td>
	            <td>{{ $item['totalPrice'] }} zł</td>
	            
	        </tr>
	        @endforeach
		</table>
	</div>
	<div class="panel">
		<div class="row row-left-align">
			<strong>Metoda wysyłki:</strong> <span> {{$delivery->name}}, {{$delivery->cost}} zł </span>
		</div>
		<div class="row row-left-align">
			<strong>Sposób zapłaty:</strong> <span> {{$payment->name}} </span>
		</div>
		<div class="row row-left-align">
			<strong>Adres: </strong>
			
			<span>{{ $address->street }} </span>
			<span>{{ $address->house_number }}<span> 
			@if ($address->apartment_number)
				<span>/{{ $address->apartment_number }} </span>
			@endif
			<span>{{ $address->postcode }} {{ $address->city }}</span>
		</div>
			
	</div>

	<h2>Koszt zamówienia: {{ $cart->totalPrice + $delivery->cost }} zł </h2>
	
	<div class="subpanel-container">
		<h1>Składam zamówienie</h1>
		
		@if(isset($confirmation_error))
			<div class="information-panel error-panel">{{$confirmation_error}}</div>
		@endif

		{{ Form::open(['route' => 'order.store', 'class' => 'form-classic']) }}
			<div class="row row-left-align">
				<input type="checkbox" id="confirmation" name="confirmation" />
				<label for="confirmation"><span></span>Akceptuję regulamin*</label>
			</div>
			<div class="row row-left-align">
				{{ Form::submit('Zamawiam i płacę') }}
			</div>
		{{ Form::close() }}
	</div>
</div>

@stop