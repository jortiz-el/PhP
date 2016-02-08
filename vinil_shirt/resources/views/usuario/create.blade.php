@extends('layout.layout')


@section('content')
<div class="form">
	<h1>Registro Nuevo Usuario</h1>
	{!!Form::open(['route'=>'usuario.store','method'=>'POST'])!!}
		<div class="form-group">
			{!!Form::label('nombre:')!!}
			{!!Form::text('name',null,['placeholder'=>'Ingresa el nombre del Usuario'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Correo:')!!}
			{!!Form::text('email',null,['placeholder'=>'Ingresa el correo del Usuario'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Contraseña:')!!}
			{!!Form::password('password')!!}
		</div>
		{!!Form::submit('Registrar',['class' => 'cyan boton'])!!}
	{!!Form::close()!!}
</div>
<br><br>	
@stop