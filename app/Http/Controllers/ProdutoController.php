<?php namespace estoque\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller{

	public function lista() {

		$produtos = DB::select('select * from produtos');

		// valida se a view existe
		if (view()->exists('produto.listagem')) { 
			return view('produto.listagem')->with('produtos', $produtos);
		}
	}

	public function mostra($id) {
		// outra forma de pegar o ID da url
		// $id = Request::route('id');

		$produto = DB::select('select * from produtos where id = ?', [$id]);

		if(empty($produto)) {
			return "Esse produto não existe.";
		}

		return view('produto.detalhes')->with('p', $produto[0]);
	}

	public function novo() {

		return view('produto.formulario');
	}

	public function adiciona() {
		$nome = Request::input('nome');
		$valor = Request::input('valor');
		$descricao = Request::input('descricao');
		$quantidade = Request::input('quantidade');

		DB::insert('insert into produtos (nome, valor, descricao, quantidade) 
			values (?, ?, ?, ?)', array($nome, $valor, $descricao, $quantidade));

		// return view('produto.listagem')->with('nome', $nome);

		// direciona para a tela de listagem
		// return redirect('/produtos')->withInput();

		// para passar parametros especificos
		/*
		return redirect('/produtos')->withInput(Request::only('nome'));
		*/

		// para negar um parametro
		/* 
		return redirect('/usuarios')->withInput(Request::except('senha'));
		*/

		// outra forma de enviar parametros
		
		return redirect()
		  ->action('ProdutoController@lista')
		  ->withInput(Request::only('nome'));
		
	}

	public function produtosJson() {
		$produtos = DB::select('select * from produtos');
 
		return $produtos;
		
	}

}