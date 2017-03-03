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
				
				{{ Form::open(['route' => ['cart.add', $product->id]]) }}
					{{ Form::submit('Kup',['class' => 'product-buy-button']) }}
				{{ Form::close() }}
			</div>
		</div>
			
	@endforeach

@endsection

