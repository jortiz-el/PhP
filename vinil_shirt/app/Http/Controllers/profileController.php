<?php namespace Vinil\Http\Controllers;

use Vinil\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use Vinil\User;
use Vinil\Profiles;

class profileController extends Controller {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
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
		$this->middleware('auth');
	}

	public function getProfile() {

		return view('layout.perfil');
	}
	public function editProfile() {

		return view('layout.perfilEdit');
	}

	public function saveProfile(Request $request) {

		$user = $this->auth->user();
		$profile = Profiles::where('user_id',$user->id)->get();

		if ( $request->get('password') !== "") {
			$user->password = $request->get('password');
		} 
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->save();

		$profile[0]->acerca = $request->get('about');
		$profile[0]->save();

		return new RedirectResponse(url('/perfil'));


	}

	public function deleteProfile() {

		$user = $this->auth->user();
		$user->delete();

		return new RedirectResponse(url('/'));

	}

}
