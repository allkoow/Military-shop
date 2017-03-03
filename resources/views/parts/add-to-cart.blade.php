{{ Form::open(['route' => ['cart.add', $product->id]]) }}
	{{ Form::submit('Kup',['class' => 'product-buy-button']) }}
{{ Form::close() }}