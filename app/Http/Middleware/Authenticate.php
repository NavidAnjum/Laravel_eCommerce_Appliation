<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Arr;

use Closure;

class Authenticate extends Middleware
{
    protected $guards = [];
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

//        if (! $request->expectsJson()) {
//            return route('login');
//        }
        if (! $request->expectsJson()) {
            if (Arr::first($this->guards) === 'admin') {
                return route('admin.login');
            }

            //we have to change it for user
            return route('login');
        }
    }
}
