@extends('adminpanel/layout')

@section('adminpanel-content')

	@if (count($products) > 0)
		<table class='table-default'>
			<tr>
				<th>Id</th>
				<th>Nazwa</th>
				<th>Kategoria</th>
				<th>Podkategoria</th>
				<th>Marka</th>
				<th>Liczba [szt.]</th>
				<th>Cena [zł]</th>
				<th></th>
				<th></th>
			</tr>
		@foreach($products as $product)
			<tr>
				<td>{{$product->id}}</td>
				<td>
					<a href="{{URL::route('products.show', ['product' => $product->name])}}">{{$product->name}}</a>
				</td>
				<td>{{$product->category->name}}</td>
				<td>{{$product->subcategory->name}}</td>
				<td>{{$product->brand->name}}</td>
				<td>{{$product->number}}</td>
				<td>{{$product->price}}</td>
				
				<td>
					<a href='products/{{$product->id}}/edit'>
						<button class="button-table">Edytuj</button>
					</a>
				</td>
				
				<td>
					{{ Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id]]) }}
	    				{{ Form::submit('Usuń', ['class' => 'button-table']) }}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
		</table>
	@else
		<p>Nie dodano jeszcze żadnych produktów :(</p>
	@endif
	
	<div class="row row-left-align">
		<a href="/../adminpanel/products/create">
			<button class="button-default">Dodaj nowy produkt</button>
		</a>
	</div>
	
	{{$products->links()}}

@endsection