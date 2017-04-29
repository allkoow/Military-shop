@extends('layout')

@section('adminpanel')

<div class="panel-container">
	<div class="panel-menu">
		<ul>
			<li><a class='link-default link-color-dark' href="/../adminpanel">Panel główny</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/orders">Zamówienia</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/products">Baza produktów</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/categories">Baza kategorii</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/users">Baza użytkowników</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/brands">Baza marek produktów</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/deliveries">Baza metod wysyłki</a></li>
			<li><a class='link-default link-color-dark' href="/../adminpanel/payments">Baza metod płatności</a></li>
		</ul>
	</div>
	
	<div class="panel-content">
		@yield('ordersIndex')
		@yield('ordersShow')

		@yield('categoriesIndex')

		@yield('usersIndex')

		@yield('adminpanel-content')
	</div>
</div>

@endsection