<?php namespace estoque\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;
use estoque\Categoria;
// use Validator;

class ProdutoController extends Controller{

	/*
	// para aplicar um middleware especifico no controller
	public function __construct()
  	{	
    	$this->middleware('autorizacao',);
  	}*/

	/*public function lista() {

		$produtos = DB::select('select * from produtos');

		// valida se a view existe
		if (view()->exists('produto.listagem')) { 
			return view('produto.listagem')->with('produtos', $produtos);
		}
	}*/

	public function lista(){
	    $produtos = Produto::all();
	    return view('produto.listagem')->with('produtos', $produtos);
	}

	/*public function mostra($id) {
		// outra forma de pegar o ID da url
		// $id = Request::route('id');

		$produto = DB::select('select * from produtos where id = ?', [$id]);

		if(empty($produto)) {
			return "Esse produto não existe.";
		}

		return view('produto.detalhes')->with('p', $produto[0]);
	}*/

	public function mostra($id){
	    $produto = Produto::find($id);
	    if(empty($produto)) {
	        return "Esse produto não existe";
	    }
	    return view('produto.detalhes')->with('p', $produto);
	}

	public function novo() {

		return view('produto.formulario')->with('categorias', Categoria::all());
	}

	/*public function adiciona() {
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
		//return redirect('/produtos')->withInput(Request::only('nome'));

		// para negar um parametro
		// return redirect('/usuarios')->withInput(Request::except('senha'));
		

		// outra forma de enviar parametros
		
		return redirect()
		  ->action('ProdutoController@lista')
		  ->withInput(Request::only('nome'));
		
	}*/

	public function adiciona(ProdutosRequest $request){

		// assim...
		/*
	    $params = Request::all();
	    $produto = new Produto($params);
	    $produto->save();
		
		// ou assim e com menos codigo
		Produto::create(Request::all());
		*/

		// validando os dados do form com Validator
		/*$validator = Validator::make(
		    [
		      'nome' => Request::input('nome'),
		      'descricao' => Request::input('descricao'),
		      'valor' => Request::input('valor'),
		      'quantidade' => Request::input('quantidade')
		    ],
		    [
		      'nome' => 'required|min:5'
		      'descricao' => 'required|max:255',
		      'valor' => 'required|numeric',
		      'quantidade' => 'required|numeric'
		    ]
		);

		if ($validator->fails())
	  	{
		    return redirect()->action('ProdutoController@novo');
	  	}*/

		Produto::create($request->all());
		

	    return redirect()
	        ->action('ProdutoController@lista')
	        ->withInput(Request::only('nome'));
	}

	public function remove($id){
	    $produto = Produto::find($id);
	    $produto->delete();

	    return redirect()
        ->action('ProdutoController@lista');
	}

	public function produtosJson() {
		$produtos = DB::select('select * from produtos');
 
		return $produtos;
		
	}

}