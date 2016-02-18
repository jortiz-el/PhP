<?php namespace Vinil\Http\Controllers;

use Vinil\Http\Requests;
use Vinil\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Vinil\Productos;
use Vinil\categorias;


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

	public function Productos($id) {
		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,$id)
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw('categorias_id = '.$id.' and descuento <> 1')
			->orderBy('descripcion', 'ASC')
			->paginate(9);
		}


        return view('layout.producto', compact('productos'));
	}



	

	public function Search(Request $request) {
		
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

	public function Sort(Request $request, $id) {

		if ($this->auth->check()){
			$productos = Productos::where('categorias_id', '=' ,$id)
			->orderBy($request->get('sort'), 'ASC')
			->paginate(9);
		} else {
			$productos = Productos::whereRaw("categorias_id = ".$id." and descuento <> 1")
			->orderBy($request->get('sort'), 'ASC')
			->paginate(9);
		}


        return view('layout.producto', compact('productos'));
		
	}

	public function Descripcion($id) {

		$producto = Productos::where('id', '=' ,$id)->get();

        return view('layout.descripcion', compact('producto'));
	}



}
