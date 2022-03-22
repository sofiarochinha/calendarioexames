<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Caso o utilizador não esteje logado não permite navegar pelas páginas
     * return route
     */
    protected function redirectTo($request)
    {
        if (!Auth::check()) {
            return route('login');
        }
    }
}
