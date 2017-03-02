@extends('userpanel.layout')

@section('userpanel-content')
	@if(session('deleteAddressError'))
		<span>{{session('deleteAddressError')}}</span>
	@endif

	<div class="userpanel-addaddres">
		<a href="{{route('addresses.create')}}">Dodaj nowy adres</a> </br> </br>
	</div>
	
	@foreach($addresses as $address)
		<div class="userpanel-address">
			<span>{{$address->name}}</span> </br>

			@if($address->id == Auth::user()->default_address)
				DOMYŚLNY </br>
			@endif
			
			<span>Miasto: </span> <span>{{$address->city}}</span> </br>
			
			<span>Ulica: </span> 
			<span>{{$address->street}} {{$address->house_number}}
				@if ($address->apartment_number)
					<span>/{{$address->apartment_number}}</span> </br>
				@else
					</br>
				@endif
			</span>
			
			<span>Kod pocztowy: </span> <span>{{$address->postcode}}</span> </br>
			
			<a href="{{route('addresses.edit',['id' => $address->id])}}">Edytuj</a>

			{{ Form::open(['route' => ['addresses.destroy',$address->id], 'method' => 'DELETE']) }}
				{{ Form::submit('Usuń') }}
			{{ Form::close() }}

			<a href="addresses/{{$address->id}}/setdefault">Ustaw jako domyślny</a>
		</div>

		</br>
	@endforeach
@stop