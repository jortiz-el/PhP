<?php namespace Vinil\Http\Controllers;

use Vinil\Http\Requests;
use Vinil\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Vinil\Productos;


class productoController extends Controller {
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function getIndex() {

		if ($this->auth->check()){
			$productos = Productos::orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::where('descuento', '<>' ,'1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getCamiseta() {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,'2')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = 2 and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getCamisetach() {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,'1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = 1 and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getMusculosa() {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,'3')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = 3 and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getGorrapl() {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,'4')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = 4 and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getGorratr() {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,'5')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = 5 and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getSudadera() {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,'6')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = 6 and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getSudaderacap() {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,'7')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = 7 and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getTaza() {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,'8')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = 8 and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}
		

        return view('layout.producto', compact('productos'));
	}

	public function getSearch(Request $request) {
		
		if ($this->auth->check()){
			$productos = Productos::name($request->get('search'))
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::name($request->get('search'))
			->where('descuento', "<>", 1)
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}


        return view('layout.producto', compact('productos'));
	}

	public function getSort(Request $request) {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,$request->get('id'))
			->orderBy($request->get('sort'), 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw("categorias_id = ".$request->get('id')." and descuento <> 1")
			->orderBy($request->get('sort'), 'ASC')
			->paginate(9);
		}

        return view('layout.producto', compact('productos'));
		
	}

	public function getDescripcion(Request $request) {

		$producto = Productos::where('id', '=' ,$request->get('id_producto'))->get();

		return view('layout.descripcion', compact('producto'));
	}



}
