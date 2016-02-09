<?php namespace Vinil;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model {

	
    protected  $table = "categorias";

    public function producto() {
    	
    	return $this->hasOne('Vinil\Productos');
    }
}
