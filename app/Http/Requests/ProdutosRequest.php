<?php namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

// COMANDO PARA GERAR CLASSE DE VALIDAÇÃO DE REQUEST:
// php artisan make:request ProdutosRequest

class ProdutosRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// valor defaul e false, mas deve ser alterado para true para permitir que o usuário salve os dados 
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nome' => 'required|max:100',
	       	'descricao' => 'required|max:255',
	       	'valor' => 'required|numeric'
		];
	}

	/**
	 * Customização de msg de erro
	 */
	public function messages() {
		return [
		     'required' => 'O campo :attribute é obrigatório.',
		  ];
	}

}
