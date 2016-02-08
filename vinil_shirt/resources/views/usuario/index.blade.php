@extends('layout.layout')


@section('content')
<div class="form">
	<h1>Iniciar sesion de Usuario </h1>
        {!!Form::open(['route'=>'usuario.index','method'=>'POST'])!!}
		<div class="form-group">
			{!!Form::label('Correo:')!!}
			{!!Form::text('email',null,['placeholder'=>'Ingresa el correo del Usuario'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Contraseña:')!!}
			{!!Form::password('password')!!}
		</div>
		{!!Form::submit('Enviar',['class' => 'cyan boton'])!!}
	{!!Form::close()!!}
</div>
<div>
    <h1>Registro nuevo Usuario </h1>
    <a class="cyan boton" href="{{url('/usuario/create')}}">Registro</a>
</div>
<br><br>	
@stop