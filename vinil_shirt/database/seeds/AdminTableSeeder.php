<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;


class AdminTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$id = \DB::table('users')->insertGetId(array(
			'name'     => 'Joao',
			'email'    => 'ojoao@joao.com',
			'password' => \Hash::make('entrar'),
			'type'     => 'admin',
			'confirmed'=> 1
			));
		\DB::table('profiles')->insert(array(
					'user_id'     	=> $id,
					'acerca'     => $faker->sentence($nbWords = 15, $variableNbWords = true)
				));
	}
}
