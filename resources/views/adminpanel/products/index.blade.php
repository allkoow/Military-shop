@extends('adminpanel/layout')

@section('adminpanel-content')

	<table class='table-standard'>
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
			<td>{{$product->name}}</td>
			<td>{{$product->category->name}}</td>
			<td>{{$product->subcategory->name}}</td>
			<td>{{$product->brand->name}}</td>
			<td>{{$product->number}}</td>
			<td>{{$product->price}}</td>
			<td><a href='products/{{$product->id}}/edit'>Edytuj</a></td>
			<td>
				{{ Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id]]) }}
    				{{ Form::submit('Usuń') }}
				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</table>

	<a href="/../adminpanel/products/create">Dodaj nowy produkt</a>
	{{$products->links()}}

@endsection