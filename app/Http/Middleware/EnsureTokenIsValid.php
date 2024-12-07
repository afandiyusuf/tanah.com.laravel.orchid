<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AppUser;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->input('token')){
            $user = AppUser::where('token', $request->input('token'))->first();

            if(!$user){
                return response()->json(['message' => 'Invalid token'], 401);
            }
        }else{
            return response()->json(['message' => 'Token is required'], 401);
        }

        return $next($request);
    }
}
