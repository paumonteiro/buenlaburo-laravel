@extends('layouts.app')

@section('content')

  <body>
		<div class="container">
			<h1>Editando: {{$product->name}}</h1>

	    <form class="col-md-5" action="/productos/{{$product->id}}" method="post">
				{{ csrf_field() }}
	      {{ method_field('patch') }}
		  	<div class="form-group">
			  	<label for="name">Nombre</label>

					<input type="text" name="name" id="name" value="{{$product->name}}" class="form-control">
								 @if ($errors->has('name'))
										 <div class="alert alert-danger">
												 <ul>
														 @foreach ($errors->get('name') as $error)
																 <li>{{ $error }}</li>
														 @endforeach
												 </ul>
										 </div>
								 @endif
		  	</div>

				<div class="form-group">
					<label for="image" > Imagen </label>
					<input type="file" name="image" accept="image/*" value="{{$product->image}}">
				</div>

				<div class="form-group">
					<label for="active"> Estado </label><br>
					<input type="radio" name="active" value="1" checked> Activo <br>
					<input type="radio" name="active" value="0"> Inactivo <br>
				</div>

		  	<div class="form-group">
		  		<label for="cost">Costo</label>
		  		<input type="text" name="cost" id="cost" value="{{$product->cost}}" class="form-control">
						  		@if ($errors->has('cost'))
						  			<div class="alert alert-danger">
						  				<ul>
						  					@foreach ($errors->get('cost') as $error)
						  					    <li>{{ $error }}</li>
						  					@endforeach
						  				</ul>
						  			</div>
						  		@endif
		  	</div>

		  	<div class="form-group">
		  		<label for="profit_margin">Ganancias</label>
		  		<input type="text" name="profit_margin" id="profit_margin" value="{{$product->profit_margin}}" class="form-control">
						  		@if ($errors->has('profit_margin'))
						  			<div class="alert alert-danger">
						  				<ul>
						  					@foreach ($errors->get('profit_margin') as $error)
						  					    <li>{{ $error }}</li>
						  					@endforeach
						  				</ul>
						  			</div>
						  		@endif
		  	</div>

	      <div class="form-group">
	        <label for="category_id">Categoría (1-3):</label>
	        <input type="text" name="category_id" id="category_id" value="{{$product->category_id}}" class="form-control">

	      </div>

		  	<div class="form-group">
		  		<button type="submit" name="button" class="btn btn-primary">Enviar</button>
		  		<a href="/productos/{{$product->id}}">Cancelar</a><br><br>
					<form action="/productos/{{$product->id}}" method="post">
						{{ csrf_field() }}
						{{ method_field('delete') }}
						<button type="submit">Borrar Producto</button>
					</form>
		  	</div>
		  </form>
		</div>

  </body>

@endsection
