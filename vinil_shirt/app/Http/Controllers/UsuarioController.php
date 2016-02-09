<?php namespace Vinil\Http\Controllers;



use Vinil\Categorias;
use Vinil\Productos;

class UsuarioController extends Controller {

	
	public function getOrm() {

		/*$categorias = Categorias::select('id','nombre')
		->with('producto')
		->get();

		dd($categorias->toArray());
		*/
		$productos = Productos::orderBy('descripcion', 'ASC')
		->paginate();
		return view('layout.productos', compact('productos'));
	}

	public function getIndex() {

		$result = \DB::table('categorias')
		->select([
			'categorias.id as categ_id',
			'categorias.nombre',
			'productos.*'
			])
		->orderBy('id', 'ASC')
		->join("productos", "categorias.id", "=", "productos.categorias_id")
		->get();

		dd($result);

		return $result;
	}

	

}
