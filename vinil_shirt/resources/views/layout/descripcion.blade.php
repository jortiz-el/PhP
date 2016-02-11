@extends('layout.layout')


@section('content')
		<section>
			<section>
				<header>
					<h2>Productos<span> Vinil-Shirt</span></h2>
				</header>	
				<div class="container row container_descripcion">
					<div class="col-md-4 ">
						<img class="img " src="{{ asset('imagenes/prod/'.$producto[0]->imagen.'.jpg') }}" title="starwars" alt="amarillo">
					</div>
					<div class="col-md-7 row">
							<div class="col-md-12 desc"><span>Nombre: </span>{{ $producto[0]->disenio }}</div>
						@if ( $producto[0]->descuento  === 0)
							<div class="col-md-12 desc"><span>Precio: </span><b class="verde">{{ $producto[0]->precio }}€</b></div>
							<div class="col-md-12 desc"><span>Descuento: </span>No</div>
						@else
							<div class="col-md-12 desc"><span>Precio: </span><b class="descuento">{{ $producto[0]->precio }}€</b></div>
							<div class="col-md-12 desc"><span>Descuento: </span><b class="verde">{{ $producto[0]->precio-4.25 }}€</b></div>	
						@endif
							<div class="col-md-12 desc"><span>Descripcion: </span>{{ $producto[0]->descripcion }}</div>
							<div>
								<a href="{{ URL::previous() }}" class="btn btn-default cyan">Volver a lista</a>
							</div>
					</div>
				</div>
			</section>
		</section>
@stop