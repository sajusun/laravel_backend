<?php

use App\Http\Controllers\API\email_subscription_controller;
use App\Http\Controllers\API\Expenses_App_In_controller;
use App\Http\Controllers\ContactUsController;
use App\Models\expensesApp_In;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');


// All protected route.................................................
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('ui',function (){
        return "hello world";
    });
});
// All protected routes End ..............................................


//All public routes..........................................................
Route::any('login',[crudController::class,'login']);

//subscription api routes...........
Route::any('news_later/add',[email_subscription_controller::class,'store']);
Route::get('news_later/list',[email_subscription_controller::class,'index']);
Route::any('news_later/list/{id}/update',[email_subscription_controller::class,'update']);
Route::delete('news_later/list/{id}/delete',[email_subscription_controller::class,'destroy']);

//crud functions....................
Route::get('view',[crudController::class,'index']);
Route::post('add',[crudController::class,'store']);
Route::get('view/{id}',[crudController::class,'show']);
Route::put('view/{id}/edit',[crudController::class,'update']);
Route::delete('view/{id}/delete',[crudController::class,'delete']);

//contact us api...........
Route::post('contact/add',[ContactUsController::class,'add']);
Route::get('contact/list',[ContactUsController::class,'index']);
Route::get('contact/list/{id}',[ContactUsController::class,'show']);
Route::get('contact/search/{arg}',[ContactUsController::class,'search']);
Route::put('contact/list/{id}/edit',[ContactUsController::class,'update']);
Route::delete('contact/{id}/delete',[ContactUsController::class,'delete']);

//expenses app api
Route::get('expenses_app/in/add',[Expenses_App_In_controller::class,'store']);
Route::get('expenses_app/in/list/{user_id}',[Expenses_App_In_controller::class,'index']);
Route::get('expenses_app/in/list/{id}/view',[Expenses_App_In_controller::class,'show']);
Route::get('expenses_app/in/list/{id}/update',[Expenses_App_In_controller::class,'update']);
Route::get('expenses_app/in/list/{id}/delete',[Expenses_App_In_controller::class,'delete']);
//All public routes End..........................................................

