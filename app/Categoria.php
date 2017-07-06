<?php namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

	// informa o relacionamento de categorias com produto
	public function produtos() {
		return $this->hasMany('estoque\Produto');
	}

}
