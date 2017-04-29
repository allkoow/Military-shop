@extends('userpanel.layout')

@section('userpanel-content')
	@if(session('deleteAddressError'))
		<span>{{session('deleteAddressError')}}</span>
	@endif

	@if(count($addresses) > 0)
		<table class="table-default">
			<tr>
				<th>Nazwa</th>
				<th>Miasto</th>
				<th>Ulica</th>
				<th>Kod pocztowy</th>
				<th></th>
				<th></th>
			</tr>

			@foreach($addresses as $address)
				<tr>
					<td>{{$address->name}}</td>
					<td>{{$address->city}}</td>
					<td>
						<span>{{$address->street}}</span>
						<span>{{$address->house_number}}</span>
						<span>
							@if ($address->apartment_number)
								<span>/{{$address->apartment_number}}</span> </br>
							@endif
						</span>
					</td>
					<td>{{$address->postcode}}</td>
					<td>
						<a href="{{route('addresses.edit',['id' => $address->id])}}">
							<button class="button-small">Edytuj</button>
						</a>
					</td>
					<td>
						{{ Form::open(['route' => ['addresses.destroy',$address->id], 'method' => 'DELETE']) }}
							{{ Form::submit('Usuń',['class' => 'button-small']) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</table>
	@else
		<p>Nie dodałeś jeszcze żadnych adresów.</p>
	@endif

	<a href="{{route('addresses.create')}}">
		<button class="button-default">Dodaj nowy adres</button>
	</a>
@stop