<?php

namespace App\Http\Middleware;

use App\Http\Controllers\API\ApiTokenController;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use MongoDB\Driver\Session;
use phpDocumentor\Reflection\Types\Null_;
use Spatie\FlareClient\Api;
use Symfony\Component\HttpFoundation\Response;

class apiUser
{

    public function handle(Request $request, Closure $next): response
    {

        $query = DB::table('password_reset_tokens')->where('token', $request->token)->first();
        if (!$query) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Request',
            ]);
        }
        return $next($request);
    }

}
