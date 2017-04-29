@if($errors->any())
	@foreach($errors->all() as $error)
		<div class="information-panel error-panel">{{$error}}</div>
	@endforeach
@endif

<div class="panel">
	<div class="row row-left-align">{{ Form::label('name', 'Nazwa') }}</div>
	<div class="row row-left-align">
		{{ Form::text('name', null, ['placeholder' => 'Wpisz nazwę adresu...']) }}
	</div>

	<div class="row row-left-align"> {{ Form::label('city', 'Miejscowość') }} </div>
	<div class="row row-left-align">
		{{ Form::text('city', null, ['placeholder' => 'Wpisz nazwę miejscowości...']) }}
	</div>
	
	<div class="row row-left-align"> {{ Form::label('street', 'Ulica') }} </div>
	<div class="row row-left-align">
		{{ Form::text('street', null, ['placeholder' => 'Wpisz nazwę ulicy...']) }}
	</div>
</div>

<div class="panel">
	<div class="row row-left-align">{{ Form::label('house_number', 'Nr domu') }} </div>
	<div class="row row-left-align">
		{{ Form::text('house_number', null, ['placeholder' => 'Wpisz nr domu...']) }}
	</div>

	<div class="row row-left-align">{{ Form::label('apartment_number', 'Nr lokalu') }}</div>
	<div class="row row-left-align">
		{{ Form::text('apartment_number', null, ['placeholder' => 'Wpisz nr lokalu...']) }}
	</div>

	<div class="row row-left-align">{{ Form::label('postcode', 'Kod pocztowy') }}</div>
	<div class="row row-left-align">
		{{ Form::text('postcode', null, ['placeholder' => 'Wpisz kod pocztowy...']) }}
	</div>
</div>

		
