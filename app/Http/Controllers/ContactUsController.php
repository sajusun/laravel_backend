<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\croud_model;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function create(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('contact');
    }

//   for web ui interface
    public function store(Request $request): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $contact=ContactUs::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'subject'=>$request->subject,
        'message'=>$request->message,
        ]);

        if($contact){
            return view('contact')->with('message','Your message has been sent');
        }else{
            return view('contact')->with('message','Something went wrong');
        }

    }
//    for api interface
    public function add(Request $request): JsonResponse
    {
        $contact=ContactUs::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);

         if($contact){
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
    public function index(): JsonResponse
    {
        $data= ContactUs::all();
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

    public function search(string $data): JsonResponse
    {

//        $data = ContactUs::where('email', $data.'%')->get();
        $data = ContactUs::whereAny(['id','email','name',],'LIKE','%'.$data.'%')->get();

        if ($data->count() > 0) {
            return response()->json([
                'status' => '200',
                'message' => 'success',
                'data' => $data
            ], 200);

        } else {
            return response()->json([
                'status' => '404',
                'message' => 'No Data Found',
                'data' => ''
            ], 404);
        }
    }
    public function show(string $id): JsonResponse
    {

        $data= ContactUs::find($id);
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



    public function update(Request $request, int $id): JsonResponse
    {

        $data = ContactUs::find($id);
        if ($data) {
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,

            ]);
            return response()->json([
                'status' => '200',
                'message' => 'update successful',
                'data' => $request->all()
            ], 200);
        } else {
            return response()->json([
                'status' => '500',
                'message' => 'Something Went wrong',
                'data' => $request->all()
            ], 500);
        }
    }

    public function delete($id): JsonResponse
    {
        $data=croud_model::find($id);
        if($data){
            $data->delete();
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
