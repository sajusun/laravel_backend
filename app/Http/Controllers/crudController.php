<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\croud_model;

class crudController extends Controller
{
    //
    public function index(){
        $data= croud_model::all();
        if($data->count() > 0){
            return response()->json([
                'status'=> '200',
                'message'=> 'success',
                'data'=> $data
            ],200);

        }else{
        return response()->json([
            'status'=> '404',
            'message'=> 'No Data Found',
            'data'=> ''
        ],404);
    }
    }

public function store(Request $request){

    // $validator = validator::make($request->all(), [
    //     'name'=>'required|string|max:255',
    //     'position'=>'required|string|max:255',
    //     'phone'=>'required|string|max:255'
    // ]);

$insert=croud_model::create([
'name'=>$request->name,
'position'=>$request->position,
'phone'=>$request->phone,
// 'timestamps'=>$request->timestamps
]);

if($insert){
    return response()->json([
        'status'=>'200',
        'message'=>'added successful',
        'data'=>$request->all()
    ],200);
}else{
    return response()->json([
        'status'=>'500',
        'message'=>'Something Went wrong',
        'data'=>$request->all()
    ],200);
}

}

public function show($id){

    $data= croud_model::find($id);
    if($data->count() > 0){
        return response()->json([
            'status'=> '200',
            'message'=> 'success',
            'data'=> $data
        ],200);

    }else{
    return response()->json([
        'status'=> '404',
        'message'=> 'No Data Found',
        'data'=> ''
    ],404);
}
}

public function update(Request $request, int $id){

    $obj=croud_model::find($id);
    if($obj){
        $obj->update([
            'name'=>$request->name,
            'position'=>$request->position,
            'phone'=>$request->phone,
            ]);
            return response()->json([
                'status'=>'200',
                'message'=>'update successful',
                'data'=>$request->all()
            ],200);
    }else{
        return response()->json([
            'status'=>'500',
            'message'=>'Something Went wrong',
            'data'=>$request->all()
        ],500);
    }
}

public function delete($id){
    $obj=croud_model::find($id);
    if($obj){
        $obj->delete();
            return response()->json([
                'status'=>'200',
                'message'=>'Delete success',
                'data'=>''
            ],200);
    }else{
        return response()->json([
            'status'=>'500',
            'message'=>'Something Went wrong',
            'data'=>''
        ],500);
    }

}

}
