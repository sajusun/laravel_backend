<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

//user register
//Route::post('register',)

//protected route
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('ui',function (){
        return "hello world";
    });
});

//............
Route::get('/test',function(){
    return json_decode('{"Peter":35,"Ben":37,"Joe":43}');
});

Route::post('login',[crudController::class,'login']);

Route::get('view',[crudController::class,'index']);
Route::post('add',[crudController::class,'store']);
Route::get('view/{id}',[crudController::class,'show']);
Route::put('view/{id}/edit',[crudController::class,'update']);
Route::delete('view/{id}/delete',[crudController::class,'delete']);

