@extends('layout')

@section('productList')

	@foreach($products as $product)
			
		<div class="product">
			<a href="/../products/{{$product->name}}" >
				<span>Info</span>
				<div class="product-img">
					
				</div>
			</a>
			
			<div class="product-info">
				<div class="product-cost">{{$product->price}} zł</div>
				<div class="product-name">{{$product->name}}</div>
				
				<button class='product-buy-button'> <a href="/../products/{{$product->id}}/addToCart">Kup</a> </button>
			</div>
		</div>
			
	@endforeach

@endsection

