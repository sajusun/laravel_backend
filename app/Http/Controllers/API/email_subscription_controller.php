<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\email_free_subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class email_subscription_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = email_free_subscription::all();
        if ($data->count() > 0) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'No data found'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $find=email_free_subscription::where('email',request('email'))->get();
        if ($find->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Email already Subscribed'
            ]);
        }else {
            $data = email_free_subscription::insert(['email' => $request->email, 'subscription_at' => date('Y-m-d')]);
            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'email subscription successfully',
                    'data' => $request->all()
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'email subscription failed',
                ]);
            }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subscription=email_free_subscription::find($id);
        if ($subscription) {
            $subscription->delete();
            return response()->json([
                'success' => true,
                'message' => 'Email subscription successfully removed'

            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Invalid subscription id'
            ]);
        }
    }
}
