<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class AdminTableSeeder extends Seeder {

	public function run()
	{
		
		\DB::table('users')->insert(array(
			'name'     => 'Joao',
			'email'    => 'ojoao@joao.com',
			'password' => \Hash::make('entrar'),
			'type'     => 'admin'
			));
	}
}
