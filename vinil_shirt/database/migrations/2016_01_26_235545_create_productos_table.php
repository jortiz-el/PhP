<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->float('precio');
            $table->string('disenio');
            $table->string('descripcion');
            $table->string('imagen');
            $table->boolean('descuento')->default(0);
			$table->timestamps();
            $table->integer('categorias_id')->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productos');
	}

}
