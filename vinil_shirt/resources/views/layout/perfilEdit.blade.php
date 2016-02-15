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
					<form class="form-horizontal" role="form" method="get" action="{{ url('perfil/editar/save') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail </label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						 <div class="form-group">
						  <label for="comment" class="col-md-4 control-label">Acereca de :</label>
						  <div class="col-md-6">
						  	<textarea class="form-control " rows="5" id="comment" name="about" >{{ Auth::user()->getProfile->acerca }} </textarea>
						  </div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<a href="{{ URL::previous() }}" class="btn btn-default cyan">Volver</a>
								<button type="submit" class="btn btn-default cyan">Editar perfil</button>
								<a href="{{ url('perfil/editar/delete') }}" class="btn btn-default rojo">Eliminar usuario</a>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
@endsection