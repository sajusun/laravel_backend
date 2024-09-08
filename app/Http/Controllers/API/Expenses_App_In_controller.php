<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\expensesApp_In;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Expenses_App_In_controller extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $list = function () {
//            if (request()->searchBy!=""  && request()->yearBy!=null) {
//                return expensesApp_In::where('user_id', Auth::id())->whereMonth('created_at', request()->monthBy)->orderBy(request()->orderBy, request()->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
//            }
//            if (is_null(request()->searchBy) || empty(request()->searchBy)) {
//                return expensesApp_In::where('user_id', Auth::id())->whereMonth('created_at', request()->monthBy)->orderBy(request()->orderBy, request()->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
//            }
//            elseif (request()->yearBy != null) {
//                return expensesApp_In::where('user_id', Auth::id())->whereYear('created_at', request()->yearBy)->whereMonth('created_at', request()->monthBy)->orderBy(request()->orderBy, request()->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
//            }
            //return expensesApp_In::where('user_id', Auth::id())->whereMonth('created_at', request()->monthBy)->orderBy(request()->orderBy, request()->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
//            if (request()->searchBy != null || request()->searchBy != "") {
//                return expensesApp_In::where('user_id', Auth::id())->whereAny([
//                    'date',
//                    'details',
//                    'remarks',
//                    'amount',
//                ], 'like', '%' . request()->searchBy . '%')->orderBy(request()->orderBy, request()->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
//            }
//            if (request()->monthBy) {
//                return expensesApp_In::where('user_id', Auth::id())->whereMonth('created_at', request()->monthBy)->orderBy(request()->orderBy, request()->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
//            }
//            return expensesApp_In::where('user_id', Auth::id())->whereAny([
//                'date',
//                'details',
//                'remarks',
//                'amount',
//            ], 'like', '%' . request()->searchBy . '%')->orderBy(request()->orderBy, request()->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
        };


//        else if (request()->yearBy != null) {
//            $list1 = expensesApp_In::where('user_id', Auth::id())->whereYear('created_at', $request->yearBy)->whereMonth('created_at', $request->monthBy)->orderBy($request->orderBy, $request->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
//        }
//        else {
//            $list1 = expensesApp_In::where('user_id', Auth::id())->whereMonth('created_at', $request->monthBy)->orderBy($request->orderBy, $request->orderType)->get(['id', 'date', 'details', 'amount', 'remarks']);
//        }

        $list1 = "";
        $search = false;

        if (!empty(request()->searchBy)) {
            $search = true;
            $list1 = expensesApp_In::where('user_id', Auth::id())
                ->whereAny([
                    'date',
                    'details',
                    'remarks',
                    'amount',
                ], 'like', '%' . $request->searchBy . '%')
                ->orderBy($request->orderBy, $request->orderType)
                ->get(['id', 'date', 'details', 'amount', 'remarks']);
        }

        if (!$search) {
            $list1 = expensesApp_In::where('user_id', Auth::id())
                ->whereYear('created_at', $request->yearBy)
                ->whereMonth('created_at', $request->monthBy)
                ->orderBy($request->orderBy, $request->orderType)
                ->get(['id', 'date', 'details', 'amount', 'remarks']);
        }


        if (!is_null($list1)) {
            return response()->json([
                'success' => true,
                'message' => 'List all Expenses App In',
                'data' => $list1,
                'link' => request()->fullUrl()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No data found',
                'link' => request()->fullUrl()

            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {

////$data=$request->headers;
//        $validate = $request->validate([
//            'date' => 'required|date',
//            'details' => 'required|string',
//            'amount' => 'required|int',
//            'remarks' => 'nullable|String'
//        ]);
        if (request('date') != '' & request('details') != '' & request('amount') != '') {

            $data = expensesApp_In::create([
                'date' => request('date'),
                'details' => request('details'),
                'amount' => request('amount'),
                'remarks' => request('remarks'),
                'user_id' => Auth::user()->getAuthIdentifier(),
            ]);

            if ($data) {
                return response()->json([
                    'success' => true,
                    'message' => 'Added successfully',

                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data insert failed',
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
        $find = expensesApp_In::find($id);
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
        $data = expensesApp_In::where('user_id', Auth::id())->where('id', $id)->
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
        $data = expensesApp_In::where('id', $id)->where('user_id', Auth::user()->getAuthIdentifier())->delete();
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
