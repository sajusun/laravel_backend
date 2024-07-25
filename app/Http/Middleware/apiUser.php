<?php

namespace App\Http\Middleware;

use App\Http\Controllers\API\ApiTokenController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use MongoDB\Driver\Session;
use phpDocumentor\Reflection\Types\Null_;
use Spatie\FlareClient\Api;
use Symfony\Component\HttpFoundation\Response;

class apiUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (ApiTokenController::getToken($request)==null || ApiTokenController::getToken($request)=='') {

                return response()->json([
                    'User' => 'Invalid Authorization Request',
                ]);
            }
       // Auth::attempt(['email'=>'sajuislam266@gmail.com','password'=>'$2y$12$1KsQPxxehwvqXVw9enB1CuNXPownnL1EJb0AiD2uqi3zkMZbc6Pwy']);

        //Auth::loginUsingId(PersonalAccessToken::findToken($request->query('token'))['id']);
       // Auth::authenticate();
        return $next($request);
    }
}
