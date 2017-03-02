@extends('layout')

@section('content')
	<div class="userpanel-menu">
		<ul>
			<li><a href="/../userpanel/addresses">Adresy</a></li>
			<li><a href="/../userpanel/orders">Zamówienia</a></li>
			<li><a href="/../userpanel/settings">Ustawienia konta</a></li>
		</ul>
	</div>
	
	@yield('userpanel-content')
@stop