<!DOCTYPE html >
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Camisetas Estampadas Vinilo">
	<meta name="keywords" content="html5,css3,webdesing">
	<meta name="author" content="Joao Ortiz">
	<title>Vinil Shirt - Termoimpresion camisetas</title>
	<link rel="icon" href="{{ asset('imagenes/icono.png') }}" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/css-reset.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/vinil.css') }}" type="text/css">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
        <link rel="stylesheet/less"  href="{{ asset('less/vinil.less') }}" />
	<script src="{{ asset('js/eventos.js') }}"></script>
</head>
<body>
	<div id="container">
		<header>
			<section class="gris" id="geolo" >
				<p >
				<a href="{{url('/')}}" class ="white"><img class="middle" src="{{ asset('imagenes/geolo.png') }}" alt="img geolocalizacion"/>Encuentra tu tienda mas cercana</a>
				</p>
			</section>
			<section id="logo" class="cyan">
				<figure class="cyan" >
                                    <a href="{{url('/')}}"><img src="{{ asset('imagenes/logo2.png') }}" alt="logo"></a>
				</figure>
			</section>
			<section id="producto">
				<form action="#" method="post">
					<input type="search" id="search" onfocus="limpiar(this.id)" value="Encuentra productos, diseños..." />
					<input type="submit" name="submit" value=""/>
				</form>
				
				<section id="usuario_carrito">
					<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
                                                <li ><a class="" href="{{ url('/auth/login') }}">Login</a></li>
						<li ><a class="" href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="glyphicon glyphicon-triangle-bottom"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
				</section>
			</section>
			<nav  id="navegacion">
				<ul>
					<li class="nivel1"><a href=''>Inicio</a></li>
					<li class="nivel1"><a href="#">Diseños</a>
						<ul>
							<li><a href="#">Música</a></li>
							<li><a href="#">Deportes</a></li>
							<li><a href="#">Freak</a></li>
							<li><a href="#">Video Juegos</a></li>
							<li><a href="#">Humor</a></li>
							<li><a href="#">Series</a></li>
							<li><a href="#">Retro</a></li>
							<li><a href="#">Peliculas</a></li>
						</ul> 
					</li>
					<li class="nivel1"><a href="#">Productos</a>
						<ul>
							<li><a href="#">Camiseta</a></li>
							<li><a href="#">Camiseta chica</a></li>
							<li><a href="#">Camiseta corta</a></li>
							<li><a href="#">musculosa</a></li>
							<li><a href="#">Gorra plana</a></li>
							<li><a href="#">Gorra trucker</a></li>
							<li><a href="#">sudaderas</a></li>
							<li><a href="#">Tazas</a></li>
						</ul> 
					</li>
					<li class="nivel1"><a href="#">Contacto</a></li>
				</ul>
			</nav>
			<section class="gris clear" id="boletin" >
				<nav>
					<figure id="correo"></figure>
					<a href="#">vinildhirt@vinilshirt.com</a>
					<figure id="telefono"></figure>
					<a href="#">91 661 90 04</a>
				</nav>
				<form action="#" method="post">
					<label >Boletín</label>
					<div>
						<label >Reciba un 10% de descuento por suscribirse</label>
						<input class="gris" id="mail" type="email" onfocus="limpiar(this.id)" value="Email*" />
					</div>
					<input  type="submit" class="cyan boton" value="Enviar">
				</form>
				
			</section>
		</header>


@yield('content')


		<footer>
			<section id="satisfaccion" class="gris-oscuro">
				<article>
					<a href="#">
					<figure id="satis"></figure>
					<h5>satisfacción 100%</h5>
					<p>calidad asegurada!<br>
					   devoluciones sin problemas
					</p>
					</a>
				</article>
				<article>
					<a href="#">
					<figure id="ambiente"></figure>
					<h5>Medio ambiente</h5>
					<p>reciclamos cajas<br>
					   cuidamos el medio hambiente
					</p>
					</a>
				</article>
				<article>
					<a href="#">
					<figure id="seguridad"></figure>
					<h5>Seguridad online</h5>
					<p>compra con seguridad<br>
					   confianza online asegurada
					</p>
					</a>
				</article>
			</section>
			<section id="pie" class="gris">
				<section>
					<article>
						<h2 class="tituo_pie">quizas te interese</h2>
						<ul>
							<li><a href="#">+ Quienes somos?</a></li>
							<li><a href="#">+ Producción de vinilo</a></li>
							<li><a href="#">+ Como lavar la ropa</a></li>
							<li><a href="#">+ Precios gran tirada</a></li>
							<li><a href="#">+ Devoluciones</a></li>
							<li><a href="#">+ Aviso legal</a></li>
							<li><a href="#">+ Privacidad</a></li>
						</ul>
					</article>
					<article>
						<figure id="mapa"></figure>
					</article>
					<article>
						<h2 class="tituo_pie">Sobre Vinil Shirt</h2>
						<p>
							¿Te apasionan las camisetas? 
							Crea, Compra y vende camisetas y 
							muchos mas productos de calidad 
							con lo que te gusta de verdad.
							Con vinil hirt, alimenta tu pasión.
						</p><br>
						<p>
							Producido y enviado desde Madrid
							Mas de 100.000 clientes ya nos
							han dado su confianza.
						</p>
					</article>
				</section>
				<section>
					<div>
						<figure id="paypal"></figure>
					</div>	
					<div>
						<figure class="redes" id="face"></figure>
						<figure class="redes" id="twiter"></figure>
						<figure class="redes" id="google"></figure>
						<figure class="redes" id="linkedin"></figure>
						<figure class="redes" id="insta"></figure>
						<figure class="redes" id="rss"></figure>
						<figure class="redes" id="youtube"></figure>
					</div>
					<div class="confianza">
						<figure id="confianza"></figure>
						<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>
					</div>
					
				</section>
				<div id="licencia">
						<span property="dct:title" rel="dct:type">Vinil Shirt by</span><span property="cc:attributionName">Joao Ortiz Alegre is licensed under a </span><a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Reconocimiento-CompartirIgual 4.0 Internacional License</a>
				</div>
			</section>
		</footer>
	</div>
	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>	
</body>
</html>