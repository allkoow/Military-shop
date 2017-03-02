@extends('layout')

@section('content')
	<div class="products-page">
		<div class='filter-container'>
			{{ Form::open(['route' => 'products.index', 'method' => 'GET']) }}
				
				@if ( Input::get('category') )
					{{ Form::hidden('category',Input::get('category')) }}
				@endif

				@if ( Input::get('subcategory') )
					{{ Form::hidden('subcategory',Input::get('subcategory')) }}
				@endif

				<div class="filter">
					<div class="filter-title">
						<span>Cena</span> </br>
					</div>
						{{ Form::label('priceMin','od: ') }}
						{{ Form::text('priceMin',$data['priceMin']) }}

						{{ Form::label('priceMax','do: ') }}
						{{ Form::text('priceMax',$data['priceMax']) }}
				</div>

				<div class="filter">
					<div class="filter-title">
						<span>Marka</span> </br>
					</div>
						@foreach ($brands as $brand)
							{{ Form::label('brandsChecked[]', $brand->name) }}
							{{ Form::checkbox('brandsChecked[]', $brand->id, in_array($brand->id, $brandsChecked)) }}
						@endforeach
				</div>
				
				{{ Form::submit('Filtruj') }}
			{{ Form::close() }}
		</div>
		
		<div class='products-list'>
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


		</div>
	</div>
@stop