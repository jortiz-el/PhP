<?php namespace Vinil;

use Illuminate\Database\Eloquent\Model;
use vinil\Auth;

class Productos extends Model {

	protected  $table = "productos";
	

	public function productos() {
		return $this->get();
	}

	public function scopeName($query, $name) {

		if (trim($name) !== ""){
			$query->where('disenio', 'LIKE', "%$name%");
		}

	}

}
