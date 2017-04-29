@extends('userpanel.layout')

@section('userpanel-content')
	@if($errors->any())
		@foreach($errors->all() as $error)
			<div class="information-panel error-panel">{{$error}}</div>
		@endforeach
	@endif

	@if(session('editAddress'))
		<div class="information-panel success-panel">
			<span>{{session('editAddress')}}</span>
		</div>
	@endif

	<div class="subpanel-container">
		{{ Form::model($address, ['route' => ['addresses.update', $address->id], 'method' => 'PUT', 'class' => 'form-classic']) }}
			<div class="panel">
				<div class="row">
					{{ Form::label('name', 'Nazwa') }}
				</div>
				
				<div class="row">
					{{ Form::text('name') }}
				</div>
				
				<div class="row">
					{{ Form::label('city', 'Miejscowość') }}
				</div>
				
				<div class="row">
					{{ Form::text('city') }}
				</div>

				<div class="row">
					{{ Form::label('street', 'Ulica') }}
				</div>
				
				<div class="row">
					{{ Form::text('street') }}
				</div>
			</div>
			
			<div class="panel">
				<div class="row">
					{{ Form::label('house_number', 'Nr domu') }}
				</div>

				<div class="row">
					{{ Form::text('house_number') }}
				</div>

				<div class="row">
					{{ Form::label('apartment_number', 'Nr lokalu') }}
				</div>

				<div class="row">
					@if($address->appartment_number == 0)
						{{ Form::text('apartment_number','') }}
					@else
						{{ Form::text('apartment_number') }}
					@endif
				</div>

				<div class="row">
					{{ Form::label('postcode', 'Kod pocztowy') }}
				</div>

				<div class="row">
					{{ Form::text('postcode') }}
				</div>
			</div>
			
			<div class="row">
				{{ Form::submit('Zapisz zmiany') }}
			</div>
		{{ Form::close() }}
	</div>
@stop