<?php namespace Vinil;

use Illuminate\Database\Eloquent\Model;



class Productos extends Model {

	protected  $table = "productos";

	public function productos() {
		return $this->get();
	}

}
