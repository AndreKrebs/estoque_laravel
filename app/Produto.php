<?php namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {

	// apenas para mostrar como deve ser informado o nome da tabela
	// se segue o padrão de nome iniciando com letra minuscula e no plural não precisa informar
	protected $table = 'produtos';

	// se a tabela não vai gravar os dados nos campos 'updated_at' e 'created_at'
	public $timestamps = false; 

	// adicionado $fillable para passar array direto na hora de salvar
	protected $fillable = array('nome', 'descricao', 'valor', 'quantidade');

}

/*
Comando para criar a model:
php artisan make:model Produto
*/