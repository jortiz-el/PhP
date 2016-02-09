@extends('layout.layout')


@section('content')
		<section>
			<section id="bannerCamiseta">
			<header>
				<h5>Prueba tus propios diseños</h5>
			</header>
			<form action="#">
				<input type="submit" class="cyan boton botongrande" value="Sube tu archivo ahora">
			</form>
			</section>
			<section>
				<header>
					<h2>Diseños<span> mas buscados</span></h2>
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
			<section id ="bannerEnvio">
				<h1>Envios Gratis</h1>
				<br>
				<article>
					<p>El envío de realizará por correo
					totalmente <span>gratis*</span> </p>
					<p><br>a partir de <span class="dos">2</span> unidades!!</p>
				</article>
				<form action="#" method="post">
					<input type="submit" id="botonenvio" class="cyan boton botongrande" value="Metodos de Envio">
				</form>
			</section>
		</section>
@stop