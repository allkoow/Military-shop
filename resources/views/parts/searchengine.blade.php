{{ Form::open(['route' => 'products.search', 'class' => 'form-search-bar']) }}
	{{ Form::text('searchKey', null, ['placeholder' => 'Szukaj...']) }}
	<input type="submit" value="&#xe800;" class="icons"/>
{{ Form::close() }}
