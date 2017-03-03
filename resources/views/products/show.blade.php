@extends('layout')

@section('content')
	<div class="product-container">
		<div class="product-image">
			<img src="{{URL::asset('images/plecak.jpg')}}" alt="" />
		</div>
		
		<div class="product-param">
			<h1>{{$product->name}}</h1>
			<span>{{$product->brand->name}}<span> </br>
			
			<div class="product-availability">
				<i class="icon-ok">dostępny</i>
			</div>

			<div class="product-price">
				<span>{{$product->price}}</span>
				<span> zł </span>
			</div>

			{{ Form::open(['route' => ['cart.add',$product->id]]) }}
				<div class="product-size">
					@if(session('message'))
						{{ session('message') }}
					@endif
					<span>Wybierz rozmiar</span>
					{{ Form::select('size',$selectedSizes,1) }}
				</div>

				<div class="product-to-basket">
					{{ Form::submit('Kup',['class' => 'product-buy-button']) }}
				</div>
			{{ Form::close() }}
			
		</div>
		
		<p class="product-desc">
			{!! $product->description !!}
		</p>
	</div>
@stop