<?php namespace Vinil\Http\Controllers;

use Vinil\Productos;
use Vinil\categorias;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$productos = Productos::where('descuento', '<>' ,'1')
		->orderBy('descripcion', 'ASC')
		->paginate(9);

        return view('layout.vinil', compact('productos'));
	}

	

}
