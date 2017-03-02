<div class="menu-item menu-item-search">
    <i class="icon-search"></i>
    <div class="bookmark">
		{{ Form::open(['route' => 'products.search', 'class' => 'form-style']) }}
			{{ Form::text('searchKey', null, ['placeholder' => 'Szukaj...']) }}
			{{ Form::submit('Szukaj') }}
		{{ Form::close() }}
    </div>
</div>