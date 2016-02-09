<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ProductoTableSeeder extends Seeder {

	public function run()
	{
		
		$faker = Faker::create();
		$categorias = [
			"ch" => "camiseta chica",
			"co" => "camiseta corta",
			"mu" => "musculosa",
			"gp" => "gorra plana",
			"gt" => "gorra trucker",
			"su" => "sudadera",
			"sc" => "sudadera capucha",	
			"ta" => "taza"
		];

		foreach ($categorias as $sigla => $nombre) {
			$id = \DB::table('categorias')->insertGetId(array(
				'nombre'        => $nombre,
			));
			for ($i =0 ;$i < 8; $i++) {
				\DB::table('productos')->insert(array(
					'precio'     	=> $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 25),
					'disenio'     	=> $nombre." ".$faker->word,
					'descripcion'   => $faker->sentence($nbWords = 6, $variableNbWords = true),
					'imagen'     	=> $sigla.$faker->numberBetween($min=1, $max=8),
					'categorias_id' => $id,
					'descuento'    	=> $faker->numberBetween($min=0, $max=1)
				));
			}
		}
		
	}

}

