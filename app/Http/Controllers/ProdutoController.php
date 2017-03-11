<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;


class ProdutoController extends Controller{

	public function lista() {

        
		$html = '<h2>Listagem de produtos laravel</h2>';

		$html .= '<ul>';

		$produtos = DB::select('select * from produtos');

		foreach ($produtos as $p) {
			$html .= '<li> Nome: '. $p->nome .', Descrição: '. $p->descricao . '</li>';
		}

		$html .= '</ul>';

		return $html;

	}

}