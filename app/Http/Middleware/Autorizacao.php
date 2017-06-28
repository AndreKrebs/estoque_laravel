<?php namespace estoque\Http\Middleware;

use Closure;

class Autorizacao {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// valida request
		// se não esta autenticado direciona
		if(!$request->is('auth/login') && \Auth::guest()) {
	        return redirect('/auth/login');
	    }

		return $next($request);
	}

}
