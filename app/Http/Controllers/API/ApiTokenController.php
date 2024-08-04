<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Sanctum\Guard;
use Laravel\Sanctum\PersonalAccessToken;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Scalar\String_;


class ApiTokenController extends Controller
{
    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request): array
    {
        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }
    protected function getAccessToken(Request $request)
    {
        $id= self::getTokenId($request);
        return DB::table('personal_access_tokens')->where('id', $id)->first()->tokenable_id;

    }
    static public function isValid(Request $request): JsonResponse
    {
        $id= Auth::id();
        if ($id!==null){
            return response()->json(['isValid' => true]);
        }else{
            return response()->json(['isValid' => false]);
        }

    }
    static public function isTokenValid(Request $request): JsonResponse
    {
        $id= self::getTokenId($request);
        if ($id!==null){
            return response()->json(['isValid' => true]);
        }else{
            return response()->json(['isValid' => false]);
        }

    }
     static public function getIdByToken(Request $request)
    {
        //$id= PersonalAccessToken::findToken(self::getTokenId($request));
        return DB::table('personal_access_tokens')->where('id', self::getTokenId($request))->first()->tokenable_id;

    }
     static public function getUserByToken(Request $request): JsonResponse
     {
        //$id= PersonalAccessToken::findToken($token);
        $userId=DB::table('personal_access_tokens')->where('id', self::getTokenId($request))->first()->tokenable_id;

        $user=User::where('id', $userId)->get();

       return response()->json($user);

    }
    static public function getTokenId(Request $request)
    {
        if(self::getToken($request)!==null) {
            if (PersonalAccessToken::findToken(self::getToken($request))) {
                return PersonalAccessToken::findToken(self::getToken($request))['id'];
            }
        }
        return null;
    }
    static private function getToken(Request $request): string|null
    {
        if ($request->bearerToken()!==null){
            return $request->bearerToken();
        }
        if ($request->header('Authorization')!==null){
            return $request->header('Authorization');
        }
        if ($request->query('api_token')!==null) {
            return  $request->query('api_token');
        }
        return null;
    }



}
