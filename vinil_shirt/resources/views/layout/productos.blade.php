@extends('layout.layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading">Productos</div>

				<div class="panel-body">
					<table class="table table-striped">
					 	<tr>
					 		<th>#</th>
					 		<th>Diseño</th>
					 		<th>Precio</th>
					 		<th>Descripcion</th>
					 		<th>Acciones</th>
					 	</tr>
					 	@foreach ($productos as $producto)
					 	<tr>
					 		<td>{{ $producto->id }}</td>
					 		<td>{{ $producto->disenio }}</td>
					 		<td>{{ $producto->precio }}</td>
					 		<td>{{ $producto->descripcion }}</td>
					 		<td>
					 			<a href="">Editar</a>
					 			<a href="">Eliminar</a>
					 		</td>
					 	</tr>
					 	@endforeach
					</table>
					{!! $productos->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection