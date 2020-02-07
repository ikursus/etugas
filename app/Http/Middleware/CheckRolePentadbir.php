<?php

namespace App\Http\Middleware;

use Closure;

class CheckRolePentadbir
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Semak adakah user yang login mempunyai role/peranan sebagai pentadbir?
        if ( ! $request->user()->isPentadbir() )
        {
            return redirect()->route('home')
            ->with('mesej-gagal', 'Anda tidak mempunyai kebenaran untuk mengakses ke halaman yang ingin dibuka.');
        }

        return $next($request);
    }
}
