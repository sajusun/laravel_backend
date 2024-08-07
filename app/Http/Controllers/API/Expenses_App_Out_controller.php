<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\expensesApp_Out;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Expenses_App_Out_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $list=expensesApp_Out::all(['id','date','details','amount']);
        if($list->count()>0){
            return response()->json([
                'success' => true,
                'message' => 'List all Expenses App In',
                'data' => $list
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
        $data=expensesApp_Out::create(request()->all());
        if($data){
            return response()->json([
                'success' => true,
                'message' => 'Data inserted successfully',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data insert failed',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $find=expensesApp_Out::find($id);
        if($find){
            return response()->json([
                'success' => true,
                'message' => 'Data found',
                'data' => $find
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $data=expensesApp_Out::where('id',$id)->update(['details'=>request()->details,'amount'=>request()->amount]);
        if($data){
            return response()->json([
                'success' => true,
                'message' => 'Data updated successfully',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data update failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $data=expensesApp_Out::where('id',$id)->delete();
        if($data){
            return response()->json([
                'success' => true,
                'message' => 'Data removed successfully',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data removed failed',
            ]);
        }

    }
}
