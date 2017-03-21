<?php

Route::get('/', function(){
	return 'Primeira lógica com Laravel';
});

Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
// ao adicionar o where na rota evitamos o problema de ambiquidade nas rotas,
// exemplo: produtos/mostra/adiciona, dependendo da ordem pode dar erro se não usar o where
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');