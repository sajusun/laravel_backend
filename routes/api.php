<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test',function(){
    //return json_decode('{"Peter":35,"Ben":37,"Joe":43}');
});
Route::get('view',[crudController::class,'index']);
Route::post('add',[crudController::class,'store']);
Route::get('view/{id}',[crudController::class,'show']);
Route::put('view/{id}/edit',[crudController::class,'update']);
Route::delete('view/{id}/delete',[crudController::class,'delete']);
