<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request) {
        $contact=ContactUs::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'subject'=>$request->subject,
        'message'=>$request->message,
        ]);

        if($contact){
            return view('contact');
        }
        // if($contact){
        //     return response()->json([
        //         'status'=>'200',
        //         'message'=>'added successful',
        //         'data'=>$request->all()
        //     ],200);
        // }else{
        //     return response()->json([
        //         'status'=>'500',
        //         'message'=>'Something Went wrong',
        //         'data'=>$request->all()
        //     ],200);
        // }
    }
}
