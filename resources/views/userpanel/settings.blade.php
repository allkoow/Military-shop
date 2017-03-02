@extends('userpanel/index')

@section('settings')
	<div class="userpanel-settings">
		@if($errors->any())
			@foreach($errors->all() as $error)
				<div class="userpanel-error">{{$error}}</div>
			@endforeach
		@endif

		@if(session('changePassword'))
			<div class="userpanel-error">{{session('changePassword')}}</div>
		@endif

		<form method="post" action="edit">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$user->id}}">
			<input type="text" name="name" value="{{$user->name}}">
			<input type="text" name="surname" value="{{$user->surname}}">
			<input type="text" name="phonenumber" value="{{$user->phone_number}}">
			<input type="submit" value="Zapisz zmiany">
		</form>

		<form method="post" action="changePassword">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$user->id}}">
			<input type="password" name="passwordOld">
			<input type="password" name="passwordNew">
			<input type="password" name="passwordRepeat">
			<input type="submit" value="Zapisz zmiany">
		</form>
	</div>
@endsection
