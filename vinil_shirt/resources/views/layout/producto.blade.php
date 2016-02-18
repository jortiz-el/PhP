@extends('layout.layout')


@section('content')
		<section>
			<section>
				@if (count($productos) > 0)	
				<form action="{{ url('/producto/'.$productos[0]->categorias_id.'/sort') }}" >
					<label>Ordenar Productos: </label>
					<select name="sort" class="form-control" onchange="this.form.submit()">
					  <option value=""></option>
					  <option value="disenio">Nombre</option>
					  <option value="precio">Precio</option>
					  <option value="descripcion">Descipcion</option>
					</select>
				</form>
				@endif
				<header>
					<h2>Productos<span> Vinil-Shirt</span></h2>
				</header>	
				<div class="container row">

				@if (count($productos) > 0)	
					@foreach ($productos as $producto)
					@if ($producto->descuento === 1)
						<form action="{{ url('/producto/'.$producto->id.'/descripcion') }}">
							<div class="col-md-4 out_margin">
									<div class="ribbon"><span>OFERTA</span></div>
								<div class="div-img">
									<button class="button_click" onclick="this.form.submit()">
								    <img class="img" src="{{ asset('imagenes/prod/'.$producto->imagen.'.jpg') }}" title="starwars" alt="amarillo">
								    </button>
								    <div class="text_img">{{ $producto->disenio }}</div>
								    <div class="text_img textprice"><span class="descuento">{{ $producto->precio }}€ </span>{{ $producto->precio-4.25 }}€</div>
					 		 	</div>
							</div>
						</form>
					@else
						<form action="{{ url('/producto/'.$producto->id.'/descripcion') }}">
							<div class="col-md-4 out_margin" >
								<div class="div-img" >
									<button class="button_click" onclick="this.form.submit()">
								    <img class="img" src="{{ asset('imagenes/prod/'.$producto->imagen.'.jpg') }}" title="starwars" alt="amarillo" >
								    </button>
								    <div class="text_img">{{ $producto->disenio }}</div>
								    <div class="text_img textprice">{{ $producto->precio }}€</div>
					 		 	</div>
							</div>
						</form>
					@endif
					@endforeach

					<div id ="paginate" class="container">
						{!! $productos->render() !!}
					</div>
				@else
					<div class="row">
						<div class="">
							<img src="{{ asset('imagenes/logomail.png') }}" alt="vinil-shirt">
						</div>
						<div class="">
							<h1 class="text-center " >no hay productos en esta categoria</h1>
						</div>
						
					</div>
					
				@endif
				</div>
			</section>
		</section>
@stop