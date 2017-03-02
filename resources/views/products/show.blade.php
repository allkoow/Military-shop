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
			<div class="product-size">
				<span>Wybierz rozmiar</span>
			</div>

			<div class="product-price">
				<span>{{$product->price}}</span>
				<span> zł </span>
			</div>

			<div class="product-to-basket">
				<button class="product-to-basket"><i class="icon-basket"></i>Dodaj do koszyka</button>
			</div>
			
		</div>
		
		<p class="product-desc">
			{{$product->description}}
		</p>
	</div>
@stop