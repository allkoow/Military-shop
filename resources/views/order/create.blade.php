@extends('layout')

@section('content')
	{{ Form::open(['route' => 'order.summary', 'class' => 'form-classic']) }}
		<div class="subpanel-container">
			<div class="panel">
				<h1>Sposób dostawy</h1>
				@foreach ($deliveryMethods as $method)
					<div class="row row-left-align"> 
						<input type="radio" id="{{$method->name}}" name="delivery" value="{{$method->id}}" checked />
						<label for="{{$method->name}}"><span></span>{{$method->name}}</label>
					</div>
				@endforeach
			</div>
			<div class="panel">
				<h1>Metoda płatności</h1>
				@foreach ($paymentMethods as $method)		
					<div class="row row-left-align"> 
						<input type="radio" id="{{$method->name}}" name="payment" value="{{$method->id}}" checked />
						<label for="{{$method->name}}"><span></span>{{$method->name}}</label>
					</div>
				@endforeach
			</div>
		</div>

		<div class="subpanel-container">
			<h1>Adres</h1>

			<div class="panel" id="address-choice">
				@foreach (Auth::user()->addresses as $address)
					<div class="row row-left-align">
						<input type="radio" id="{{$address->name}}" name="address" value="{{$address->id}}" checked/>
						<label for="{{$address->name}}"><span></span>{{$address->name}}</label>
					</div>
				@endforeach

				<div class="row row-left-align">
					<input type="radio" id="input-new-address" name="address" value="new" />
					<label for="input-new-address" ><span></span>nowy adres</label>
				</div>
			</div>
			
			<div class="panel">
				<div class="subpanel-container" id="address-panel">
					@include('parts/create-address')
				</div>

				<script type="text/javascript">
					var addressPanel = $("div#address-panel div.panel");

					$(document).ready( function() {
						addressPanel.addClass("invisible");
					});

					$("div#address-choice input").change( function() {
						var input = $(this).attr('id');

						if(input == "input-new-address") {
							console.log(input);
							addressPanel.removeClass("invisible");
						}
						else {
							addressPanel.addClass("invisible");
						}
					});
				</script>
				
			</div>
		</div>

		<div class="subpanel-container">
			<h1>Podsumowanie</h1>
			<div class="row row-left-align"> {{ Form::submit('Przejdź dalej') }} </div>
		</div>
		
	{{ Form::close() }}
@stop