<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link href="/css/custom.css" rel="stylesheet">
	<title>Listagem de Produtos</title>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="/produtos">Estoque  Laravel</a>
				</div>

				<ul class="nav navbar-nav navbar-right">
					
					@if (!Auth::guest())
						<li><a href="/produtos">Listagem</a></li>
						<li><a href="/produtos/novo">Novo</a></li>
					    <!-- <li>{{ Auth::user()->name }} </li> -->
					    <li><a href="/auth/logout">Logout</a></li>
				  	@endif
				</ul>
			</div>
		</nav>

		@yield('conteudo')

		<footer class="footer">
	      	<p>Sistema de estoque!</p>
	  	</footer>

	</div>
</body>
</html>