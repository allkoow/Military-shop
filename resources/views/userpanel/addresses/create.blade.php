@extends('userpanel.layout')

@section('userpanel-content')
	<div class="subpanel-container">
		{{ Form::open(['route' => 'addresses.store', 'class' => 'form-classic']) }}
		
		@include('parts/create-address')

		<div class="row row-left-align">{{ Form::submit('Dodaj') }}</div>
			
		{{ Form::close() }}
	</div>
@endsection