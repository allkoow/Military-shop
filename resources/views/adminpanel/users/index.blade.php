@extends('adminpanel/layout')

@section('usersIndex')
	<table class='table-standard'>
		<tr>
			<th>Imię</th>
			<th>Nazwisko</th>
			<th>Nr telefonu</th>
			<th>Adres email</th>
			<th>Rola</th>
		</tr>

		@foreach ($users as $user)
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->surname }}</td>
			<td>{{ $user->phone_number }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->role->name }}</td>
		</tr>
		@endforeach
	</table>
@stop