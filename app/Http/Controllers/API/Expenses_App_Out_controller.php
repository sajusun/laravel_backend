<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\expensesApp_In;
use App\Models\expensesApp_Out;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Expenses_App_Out_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $list = expensesApp_Out::where('user_id', Auth::id())->get(['id', 'date', 'details', 'amount', 'remarks']);
        if ($list->count() > 0) {
            return response()->json([
                'success' => true,
                'message' => 'List all Expenses',
                'data' => $list
            ]);
        } else {
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
//        $validate = request()->validate([
//            'date' => 'required|date',
//            'details' => 'required|string',
//            'amount' => 'required|int',
//            'remarks' => 'nullable|String'
//        ]);

        if (request('date') != '' & request('details') != '' & request('amount') != '') {
            $data = expensesApp_Out::create([
                'date' => request('date'),
                'details' => request('details'),
                'amount' => request('amount'),
                'remarks' => request('remarks'),
                'user_id' => Auth::user()->getAuthIdentifier(),
            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Expenses Added successfully',

                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'failed',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Required parameter missing',
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $find = expensesApp_Out::find($id);
        if ($find) {
            return response()->json([
                'success' => true,
                'message' => 'Data found',
                'data' => $find
            ]);
        } else {
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
        $data = expensesApp_Out::where('user_id', Auth::id())->where('id', $id)->
        update(['date' => request()->date, 'details' => request()->details, 'amount' => request()->amount, 'remarks' => request()->remarks,]);
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Updated successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Update failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $data = expensesApp_Out::where('id', $id)->where('user_id', Auth::id())->delete();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'Remove successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Remove failed',
            ]);
        }

    }
}
