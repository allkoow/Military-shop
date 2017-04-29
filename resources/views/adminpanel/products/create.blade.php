@extends('adminpanel/layout')

@section('adminpanel-content')
{{ Form::open(['route' => 'products.store', 'files' => true, 'class' => 'form-classic form-max-width left-align', 'id' => 'creating-form']) }}
	
	<div class="subpanel-container">
		<div class="panel">
			<h1>Podstawowe informacje</h1>
			
			<div class="row">{{ Form::label('name','Nazwa') }}</div>
			<div class="row">{{ Form::text('name', null, ['placeholder' => 'Podaj nazwę produktu']) }}</div>

			<div class="row">{{ Form::label('sex','Płeć') }}</div>
			<div class="row">{{ Form::select('sex', ['male' => 'mężczyzna', 'female' => 'kobieta', 'unisex' => 'uniwersalny']) }}</div>
			
			<div class="row">{{ Form::label('price','Cena') }}</div>
			<div class="row">{{ Form::text('price', null, ['placeholder' => 'Podaj cenę']) }}</div>
			
			<div class="row">{{ Form::label('brand','Marka') }}</div>
			<div class="row">{{ Form::select('brand', $selectedBrands) }}</div>
			
			<div class="row">{{ Form::label('category','Kategoria') }}</div>
			<div class="row">{{ Form::select('category', $selectedCat) }}</div>
			
			<div class="row">{{ Form::label('subcategory','Podkategoria') }}</div>
			<div class="row">{{ Form::select('subcategory', $selectedSub) }}</div>	
		</div>

		<div class="panel">
			<h1>Wprowadzanie liczby produktów</h1>
			<div id="sizes-panel">
			
			</div>
		</div>
	</div>

	<div class="subpanel-container">
		<h1>Dodawanie zdjęć</h1>
		<div class="panel-left-align">
			{{-- <input type="file" id="images" class="input-file" name="images[]" multiple /> --}}
			<input type="file" id="images" name="images[]" multiple />
			{{-- <label for="images">Wybierz pliki</label> --}}
		</div>
	</div>

	<script type="text/javascript">
		var subcategory = document.getElementById('subcategory');
		
		window.onload = httpRequest;
		subcategory.addEventListener('change', httpRequest);

		function httpRequest() {
			var subcategoryId = subcategory.options[subcategory.selectedIndex].value;
			var url = '/adminpanel/get-sizes-list' + '/' + subcategoryId;

			request = new XMLHttpRequest();
		
			request.onreadystatechange = function() {
				var response = JSON.parse(this.responseText);
				createPanel(response);
			};

			request.open('get',url,true);
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			request.send(null);
		}

		function createPanel(data) {
			var container = document.getElementById("sizes-panel");

			while(container.hasChildNodes())
				container.removeChild(container.lastChild);

			var dataLength = data.length;

			for(var i=0; i<dataLength; i++) {
				var input = document.createElement("input");
				var label = document.createElement("label");
				var rowLabel = document.createElement("div");
				var rowInput = document.createElement("div");
				
				rowLabel.className = "row";
				rowInput.className = "row";

				label.innerHTML = data[i];
				label.for = data[i];
				
				input.type = "number";
				input.name = data[i];
				input.min = "0";
				input.value = "0";
				input.id = data[i];

				rowLabel.appendChild(label);
				rowInput.appendChild(input);

				container.appendChild(rowLabel);
				container.appendChild(rowInput);
			}
		}

	</script>

	<div class="subpanel-container">
		<h1>Opis</h1>
		{{ Form::textarea('description') }}
	</div>
	
	{{ Form::submit('Dodaj nowy produkt') }}

{{ Form::close() }}

@endsection