<?php namespace Vinil\Http\Controllers;

use Vinil\Productos;
use Vinil\categorias;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('mail');
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$productos = Productos::orderBy('descripcion', 'ASC')
		->paginate(9);

		return view('layout.vinil', compact('productos'));
	}

	public function verify($code) {

		return "hola mundo";

	}

}
