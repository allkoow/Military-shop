@extends('userpanel/index')

@section('addresses')

	@if(session('deleteAddressError'))
		<span>{{session('deleteAddressError')}}</span>
	@endif

	<div class="userpanel-addaddres">
		<a href="addaddress">Dodaj nowy adres</a> </br> </br>
	</div>
	
	@foreach($addresses as $address)
		<div class="userpanel-address">
			<span>{{$address->name}}</span> </br>
			@if($address->id == Auth::user()->default_address)
				<span>DOMYŚLNY</span> </br>
			@endif
			<span>Miasto: </span> <span>{{$address->city}}</span> </br>
			<span>Ulica: </span> <span>{{$address->street}} {{$address->house_number}}</span> </br>
			<span>Nr lokalu: </span> <span>{{$address->apartment_number}}</span> </br>
			<span>Kod pocztowy: </span> <span>{{$address->postcode}}</span> </br>
			<a href="editaddress/{{$address->id}}">Edytuj</a>
			<a href="deleteaddress/{{$address->id}}">Usuń</a>
			<a href="setdefaultaddress/{{$address->id}}">Ustaw jako domyślny</a>
		</div>

		</br>
	@endforeach
@endsection