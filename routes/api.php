<?php

use App\Http\Controllers\API\email_subscription_controller;
use App\Http\Controllers\ContactUsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

//user register
//Route::post('register',)

// All protected route
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('ui',function (){
        return "hello world";
    });
});

//............
//Route::get('/test',function(){
//    return json_decode('{"Peter":35,"Ben":37,"Joe":43}');
//});
//All public routes
Route::any('login',[crudController::class,'login']);
Route::any('news_later/add',[email_subscription_controller::class,'store']);
Route::get('news_later/list',[email_subscription_controller::class,'index']);
Route::get('news_later/list/{id}/delete',[email_subscription_controller::class,'destroy']);



//crud functions.........
Route::get('view',[crudController::class,'index']);
Route::post('add',[crudController::class,'store']);
Route::get('view/{id}',[crudController::class,'show']);
Route::put('view/{id}/edit',[crudController::class,'update']);
Route::delete('view/{id}/delete',[crudController::class,'delete']);

//contact us api
Route::post('contact/add',[ContactUsController::class,'add']);
Route::get('contact/list',[ContactUsController::class,'index']);
Route::get('contact/list/{id}',[ContactUsController::class,'show']);
Route::get('contact/search/{arg}',[ContactUsController::class,'search']);
Route::put('contact/list/{id}/edit',[ContactUsController::class,'update']);
Route::delete('contact/{id}/delete',[ContactUsController::class,'delete']);



