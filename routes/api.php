<?php

use App\Http\Controllers\API\ApiUser;
use App\Http\Controllers\API\email_subscription_controller;
use App\Http\Controllers\API\Expenses_App_In_controller;
use App\Http\Controllers\API\Expenses_App_Out_controller;
use App\Http\Controllers\ContactUsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;


Route::any('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');


// All protected route.................................................
Route::group(['middleware' => 'apiUser:api'], function () {
    //expenses app api.............
    //Route::post('expenses_app/in/add/',[Expenses_App_In_controller::class,'store']);
   // Route::any('expenses_app/in/list/',[Expenses_App_In_controller::class,'index']);
//    Route::any('expenses_app/isValid/',[ApiTokenController::class,'isTokenValid']);


//    Route::any('/ui',function (Request $request) {
//        return response()->json([
//            'Authorization'=> $request->header('Authorization'),
//            'bearer'=> $request->bearerToken(),
//            'token'=>$request->query('api_token'),
//            'user-id'=>ApiTokenController::getIdByToken($request),
//            'token-id'=>ApiTokenController::isTokenValid($request)
//
//        ]);
//    });
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::any('expenses_app/in/list/',[Expenses_App_In_controller::class,'index']);
    Route::post('expenses_app/in/add',[Expenses_App_In_controller::class,'store']);
    Route::get('expenses_app/in/list/{id}/view',[Expenses_App_In_controller::class,'show']);
    Route::post('expenses_app/in/list/{id}/update',[Expenses_App_In_controller::class,'update']);
    Route::get('expenses_app/in/list/{id}/delete',[Expenses_App_In_controller::class,'destroy']);

    Route::post('expenses_app/out/add',[Expenses_App_Out_controller::class,'store']);
    Route::get('expenses_app/out/list/',[Expenses_App_Out_controller::class,'index']);
    Route::get('expenses_app/out/list/{id}/view',[Expenses_App_Out_controller::class,'show']);
    Route::post('expenses_app/out/list/{id}/update',[Expenses_App_Out_controller::class,'update']);
    Route::get('expenses_app/out/list/{id}/delete',[Expenses_App_Out_controller::class,'destroy']);
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user/logout',[apiUser::class,'destroy']);
    Route::get('/user/isValid/',[apiUser::class,'isValid']);
});
// All protected routes End ..............................................


//All public routes..........................................................
Route::post('/user/login',[apiUser::class,'login']);
Route::post('/user/register',[apiUser::class,'store']);
Route::post('/user/reset/',[apiUser::class,'reset']);
Route::post('/user/reset/{token}',[apiUser::class,'reset_WithToken']);


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

////expenses app api.............
//Route::any('expenses_app/in/add',[Expenses_App_In_controller::class,'store'])->middleware('auth:sanctum');
//Route::any('expenses_app/in/list/',[Expenses_App_In_controller::class,'index'])->middleware('auth:sanctum');
//Route::get('expenses_app/in/list/{id}/view',[Expenses_App_In_controller::class,'show']);
//Route::any('expenses_app/in/list/{id}/update',[Expenses_App_In_controller::class,'update']);
//Route::delete('expenses_app/in/list/{id}/delete',[Expenses_App_In_controller::class,'delete']);

//Route::any('expenses_app/out/add',[Expenses_App_Out_controller::class,'store']);
//Route::any('expenses_app/out/list/{user_id}',[Expenses_App_Out_controller::class,'index']);
//Route::get('expenses_app/out/list/{id}/view',[Expenses_App_Out_controller::class,'show']);
//Route::patch('expenses_app/out/list/{id}/update',[Expenses_App_Out_controller::class,'update']);
//Route::delete('expenses_app/out/list/{id}/delete',[Expenses_App_Out_controller::class,'delete']);
//All public routes End..........................................................

