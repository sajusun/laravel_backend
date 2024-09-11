<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
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
        $validator = validator()->make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if (!$validator->fails()) {
            $findEmail = User::where('email', $request->email)->first();
            if (!$findEmail) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $token = $user->createToken($request->email)->plainTextToken;
                if ($token) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Registration success',
                        'access_token' => $token,
                        'token_type' => 'Bearer',
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Registration Failed',
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Email already exists',
                    'data' => null
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
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
                'success' => false,
                'message' => $validator->errors()->first(),
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

    static public function reset(Request $request): JsonResponse
    {
        $user = User::where('email', request()->email)->first();
        if (!is_null($user)) {
            $token = str::random(64);

            $query = DB::table('password_reset_tokens')->where('email', request()->email)->first();
            if (!$query) {
                DB::table('password_reset_tokens')->insert([
                    'email' => request()->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
            } else {
                DB::table('password_reset_tokens')->where('email', request()->email)->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => "Send Resend Link to your registered Email",
                'token' => $token

            ]);
        }
        return response()->json([
            'success' => false,
            'message' => "Email Doesn't Exist",
        ]);
    }
}
