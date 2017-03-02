@extends('userpanel/index')

@section('editaddress')
	@if($errors->any())
		@foreach($errors->all() as $error)
			<div class="userpanel-error">{{$error}}</div>
		@endforeach
	@endif

	@if(session('editAddress'))
		<span>{{session('editAddress')}}</span>
	@endif

	<form method="post" action="updateaddress" class="userpanel-form-editaddress">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{$address->id}}">
		<label for="name">Nazwa</label> <input type="text" name="name" value="{{$address->name}}"> </br>
		<label for="city">Miasto</label> <input type="text" name="city" value="{{$address->city}}"> </br>
		<label for="street">Ulica</label> <input type="text" name="street" value="{{$address->street}}"> </br>
		<label for="housenumber">Numer domu</label> <input type="text" name="housenumber" value="{{$address->house_number}}"> </br>
		<label for="apartmentnumber">Numer lokalu</label> <input type="text" name="apartmentnumber" value="{{$address->apartment_number}}"> </br>
		<label for="postcode">Kod pocztowy</label> <input type="text" name="postcode" value="{{$address->postcode}}"> </br>
		<input type="submit" value="Zapisz zmiany">
	</form>
@endsection