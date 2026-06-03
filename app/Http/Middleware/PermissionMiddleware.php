<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $permission
    ) {

        if (!auth()->check()) {
            abort(403);
        }

        if (
            !auth()->user()
                ->hasPermission($permission)
        ) {
            abort(403);
        }

        return $next($request);
    }
}