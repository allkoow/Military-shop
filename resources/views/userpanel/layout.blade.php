@extends('layout')

@section('content')
<div class="panel-container">
	
	<div class="panel-menu">
		<ul>
			<a href="/../userpanel/addresses">
				<li>
					<i class="icon-address-card"></i>
					<span>Adresy</span>
				</li>
			</a>

			<a href="/../userpanel/orders">
				<li>
					<i class="icon-shopping-bag"></i>
					<span>Zamówienia</span>
				</li>
			</a>

			<a href="/../userpanel/settings">
				<li>
					<i class="icon-cog"></i>
					<span>Ustawienia konta</span>
				</li>
			</a>
		</ul>
	</div>

	<div class="panel-content">
		@yield('userpanel-content')
	</div>

</div>
@stop