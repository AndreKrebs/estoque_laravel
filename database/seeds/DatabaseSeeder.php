<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use estoque\Categoria;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('CategoriaTableSeeder');
	}

}


// a classe pode ser separada para ficar mais organizado
class CategoriaTableSeeder extends Seeder {

	// para rodar: "php artisan db:seed" ou "php artisan db:seed --class=CategoriaTableSeeder" para 
	// rodar uma classe especifica de seed
	public function run() {
		Categoria::create(['nome' => 'Eletronico']);
		Categoria::create(['nome' => 'Eletroeletronico']);
		Categoria::create(['nome' => 'Brinquedo']);
		Categoria::create(['nome' => 'Esportes']);	
	}

}