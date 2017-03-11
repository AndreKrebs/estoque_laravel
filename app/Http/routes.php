<?php

Route::get('/', function(){
	return 'Primeira lógica com Laravel';
});

Route::get('/produtos', 'ProdutoController@lista');