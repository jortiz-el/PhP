<?php namespace Vinil\Http\Controllers;

use Vinil\Http\Requests;
use Vinil\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FrontController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('layout.vinil');
	}


	public function contacto()
	{
		return view('contacto');
	}


	public function review()
	{
		return view('review');
	}

	
}
