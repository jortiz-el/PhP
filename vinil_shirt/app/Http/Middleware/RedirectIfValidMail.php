<?php namespace Vinil\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class RedirectIfValidMail {

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
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
		if ($this->auth->check())
		{
			if($this->auth->user()->confirmed !== 1) {
				$this->auth->logout();
				return redirect('auth/login')->withErrors(['Mensaje Vinil-Shirt', 'Login Fallido, debes validar tu Email']);
			}
		}

		return $next($request);

	}

}
