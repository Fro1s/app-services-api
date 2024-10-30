<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypesMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = explode('|', $role);
        $user = User::find(Auth::id());

        if (!in_array($user->role, $roles)) {
            return response()->json([
                'error' => true,
                'message' => 'Não autorizado',
                'data' => null
            ], 401);
        }

        return $next($request);
    }
}
