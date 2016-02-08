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
					<article id="masbuscados">
						
						<ul>
							<li id="musica">
								<a href="#">Música</a>
							</li>
							<li id="deportes">
								<a href="#">Deportes</a>
							</li>
							<li id="freak">
								<a href="#">Freak</a>
							</li>
							<li id="video">
								<a href="#">Video Juegos</a>
							</li>
							<li id="humor">
								<a href="#">Humor</a>
							</li>
							<li id="series">
								<a href="#">Series</a>
							</li>
							<li id="retro">
								<a href="#">Retro</a>
							</li>
							<li id="peliculas">
								<a href="#">Peliculas</a>
							</li>
						</ul>
					
					</article>
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