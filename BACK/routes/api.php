<?php

use App\Http\Controllers\userPP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/login',[userPP::class,'login']);
Route::get('/register',[userPP::class,'register']);
Route::middleware(['cors'])->group(function () {
    Route::post('/register',[userPP::class,'register']);
    // Route::post('/register', 'userPP@register');
});


