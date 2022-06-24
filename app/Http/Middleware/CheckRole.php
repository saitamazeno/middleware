<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Redirect;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // middleware có tham số
    // public function handle($request, Closure $next, $role)
    public function handle($request, Closure $next)
    {
        // if (Auth::check()) { 
            // kiểm tra quyền truy cập và điều hướng 
            $users = Auth::user();
            if ($users->role->name == 'subcriber')
                // middleware có tham số
                // if ($users->role->name == $role)
                return redirect('/');
        // } else {
        //     return redirect('login');
        // }
        return $next($request);
    }
}
