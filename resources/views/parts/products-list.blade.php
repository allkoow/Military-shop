<div class='product-list'>
	@if(count($products) > 0)
		
		@foreach($products as $product)
			
		<div class="product">
			<a href="/../products/{{$product->name}}" >
				<div class="product-image">
				@if (count($product->images)>0)
					<img src="{{URL::asset('images/'.$product->images[0]->path)}}" alt="" />
				@else
					brak miniatury
				@endif
				</div>
		
				<div class="product-info">
					<div><h2>{{$product->name}}</h2></div>
					<div><h3>{{number_format($product->price, 2, ',', '')}} zł</h3></div>
				</div>
			</a>
		</div>
			
		@endforeach

	@else
		<span>Brak produktów w tej kategorii</span>
	@endif

</div>