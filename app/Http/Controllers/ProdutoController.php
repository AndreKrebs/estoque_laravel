<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;


class ProdutoController extends Controller{

	public function lista() {

		$produtos = DB::select('select * from produtos');

		// valida se a view existe
		if (view()->exists('listagem')) { 
			return view('listagem')->withProdutos($produtos);
		}
	}

}