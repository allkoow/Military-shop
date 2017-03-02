@extends('layout')

@section('adminpanel')

<div class="adminpanel-container">
	<div class="adminpanel-menu">
		<ul>
			<li><a class='link-default link-color-dark' href="/../adminpanel/orders">Zamówienia</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/products">Baza produktów</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/categories">Baza kategorii</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/users">Baza użytkowników</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/brands">Baza marek produktów</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/deliveries">Baza metod wysyłki</a></li>
		</ul>
	</div>
	<div class="adminpanel-content">
		@yield('productCreate')

		@yield('ordersIndex')
		@yield('ordersShow')

		@yield('categoriesIndex')

		@yield('brandsIndex')

		@yield('deliveriesIndex')

		@yield('usersIndex')

		@yield('adminpanel-content')
	</div>
</div>

@endsection