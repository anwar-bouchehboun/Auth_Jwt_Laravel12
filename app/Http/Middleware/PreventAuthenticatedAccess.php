<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

class PreventAuthenticatedAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Vérifier si un token JWT valide est présent
            $token = JWTAuth::getToken();

            if ($token) {
                // Vérifier si le token est valide et l'utilisateur existe
                $user = JWTAuth::parseToken()->authenticate();

                if ($user) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'You are already logged in. Please logout first to register a new account.',
                    ], 409); // 409 Conflict
                }
            }
        } catch (JWTException $e) {

            // Token invalide ou expiré, permettre l'accès
            return response()->json([
                'status' => 'error',
                'message' => 'Token is invalid or expired.',
            ], 401); // 401 Unauthorized
        }

        return $next($request);
    }
}
