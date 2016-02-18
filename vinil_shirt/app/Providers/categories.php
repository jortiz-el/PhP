<?php namespace Vinil\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Vinil\categorias;

class categories extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$categorias = categorias::get();
		View::share( 'categorias', $categorias );
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
