@extends('layout.layout')

@section('content')
		<header>
			<h2>Perfil<span>Usuario Vinil-Shirt</span></h2>
		</header>
		</br></br>		
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<img src="{{ asset('/imagenes/perfil_usuario.png') }}" alt="perfil_usuario">
				</div>
				<div class="col-md-9">
					<form class="form-horizontal" role="form" method="get" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<p>{{ Auth::user()->name }}</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail </label>
							<div class="col-md-6">
								<p>{{ Auth::user()->email }}</p>
							</div>
						</div>

						 <div class="form-group">
						  <label for="comment" class="col-md-4 control-label">Acereca de :</label>
						  <div class="col-md-6">
						  	<p>{{ Auth::user()->getProfile->acerca }}</p>
						  </div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<a href="{{ url('/perfil/editar') }}" class="btn btn-primary cyan">Editar usuario</a>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
@endsection