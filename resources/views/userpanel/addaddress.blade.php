@extends('userpanel/index')

@section('addaddress')
	@if($errors->any())
		@foreach($errors->all() as $error)
			<div class="userpanel-error">{{$error}}</div>
		@endforeach
	@endif

	<form method="post" action="storeaddress" class="userpanel-form-addaddress">
		{{ csrf_field() }}
		<label for="name">Nazwa</label> <input type="text" name="name"> </br>
		<label for="city">Miasto</label> <input type="text" name="city"> </br>
		<label for="street">Ulica</label> <input type="text" name="street"> </br>
		<label for="housenumber">Numer domu</label> <input type="text" name="housenumber" > </br>
		<label for="apartmentnumber">Numer lokalu</label> <input type="text" name="apartmentnumber" > </br>
		<label for="postcode">Kod pocztowy</label> <input type="text" name="postcode"> </br>
		<input type="submit" value="Dodaj adres">
	</form>
@endsection