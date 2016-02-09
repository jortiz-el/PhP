@extends('layout.layout')


@section('content')
		<section>
			<section>
				<header>
					<h2>Productos<span> Vinil-Shirt</span></h2>
				</header>	
				<div class="container row">

					@foreach ($productos as $producto)
					@if ($producto->descuento === 1)
						<div class="col-md-4 out_margin">
								<div class="ribbon"><span>OFERTA</span></div>
							<div class="div-img">
							    <img class="img" src="{{ asset('imagenes/prod/'.$producto->imagen.'.jpg') }}" title="starwars" alt="amarillo">
							    <div class="text_img">{{ $producto->disenio }}</div>
							    <div class="text_img textprice"><span class="descuento">{{ $producto->precio }}€ </span>{{ $producto->precio-4.25 }}€</div>
				 		 	</div>
						</div>
					@else
						<div class="col-md-4 out_margin">
							<div class="div-img">
							    <img class="img" src="{{ asset('imagenes/prod/'.$producto->imagen.'.jpg') }}" title="starwars" alt="amarillo">
							    <div class="text_img">{{ $producto->disenio }}</div>
							    <div class="text_img textprice">{{ $producto->precio }}€</div>
				 		 	</div>
						</div>
					@endif
					@endforeach
					<div id ="paginate" class="container">
						{!! $productos->render() !!}
					</div>
				</div>
			</section>
		</section>
@stop