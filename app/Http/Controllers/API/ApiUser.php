<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Guard;
use Illuminate\Validation\Rules;

class ApiUser extends Guard
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($user){
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'User not created',
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function login(Request $request): JsonResponse
    {
        $validator = validator()->make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'data' => $request->all()
            ]);
        } else {
            $data = User::where('email', $request->email)->first();
            if ($data && Hash::check($request->password, $data->password)) {
                $token = $data->createToken($request->email)->plainTextToken;
                return response()->json([
                    'success' => true,
                    'message' => 'login success',
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]);

            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'login failed',
                    'data' => $request->all()
                ]);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(): JsonResponse
    {
        //Auth::guard('api')->logout();
        // Auth::guard('web')->logout();
        // delete all tokens, essentially logging the user out
        Auth::User()->tokens()->delete();
        return response()->json([
            "message" => "Logout success",
            'success' => true
        ]);
    }

    static public function isValid(): JsonResponse
    {
        $id = Auth::id();
        if ($id !== null) {
            return response()->json([
                'success' => true,
                'message' => "Valid User",
                ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Invalid User",
            ]);
        }

    }

    static public function api_login(Request $request): void
    {

    }
}
