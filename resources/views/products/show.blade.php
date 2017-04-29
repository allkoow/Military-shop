@extends('layout')

@section('content')
	<div class="product-container">
		<div class="panel product-image">
			@if (count($product->images)>0)
				<img src="{{URL::asset('images/'.$product->images[0]->path)}}" alt="" />
			@endif
		</div>
		
		<div class="panel product-param">
			<h1>{{$product->name}}</h1>
			<div class="brand-name">{{$product->brand->name}}</div>
			
			<div class="product-availability">
				@if($product->number)
					<i class="icon-ok">dostępny</i>
				@else
					<i class="icon-cancel">niedostępny</i>
				@endif
			</div>

			<div class="product-price">
				<span>{{ number_format($product->price, 2, ',', '') }}</span>
				<span> zł </span>
			</div>
			
			@if($product->number)
				{{ Form::open(['route' => 'cart.store']) }}
					
					{{ Form::hidden('productId', $product->id )}}
					{{ Form::hidden('productName', $product->name ) }}
					{{ Form::hidden('productPrice', $product->price ) }}

					@if($product->sizes()->first()->name != $product->noSize)
						<div class="product-size">
							<span>Wybierz rozmiar</span>
							{{ Form::select('sizeId', $sizesForSelect, 1, ['class' => 'select-default']) }}
						</div>
					@else
							{{ Form::hidden('sizeId', $product->noSize) }}
					@endif

					<div class="product-to-basket">
						{{ Form::submit('Dodaj do koszyka', ['class' => 'button-default']) }}
					</div>
				{{ Form::close() }}
			@else
				<div class="product-to-basket">
					<button class="button-default button-disabled">Brak produktu</button>
				</div>
			@endif
			
		</div>
		
		<p class="product-desc">
			{!! $product->description !!}
		</p>
	</div>
@stop

