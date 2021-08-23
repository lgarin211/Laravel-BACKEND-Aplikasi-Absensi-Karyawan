<?php

use App\Http\Controllers\homepage;
use App\Http\Controllers\LogAbsenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/maintance', function () {
    return view('welcome');
});

Route::get('/',[homepage::class,'index']);
Route::get('/absen',[LogAbsenController::class,'read']);

Route::get('/dashboard2', function () {
    return view('dashboard');
    // return view('absen/capture');
});
Route::post('/req/sen1',[LogAbsenController::class,'create']);
Route::get('/req/sen2',[LogAbsenController::class,'keluar']);
Route::get('/req/sen3',[LogAbsenController::class,'cekon']);
Route::get('/req/sen4',[LogAbsenController::class,'cekon2']);
Route::get('/req/sen5',[LogAbsenController::class,'retable']);
Route::get('/dam',[LogAbsenController::class,'capture']);
Route::post('/capturePost',[LogAbsenController::class,'capturePost'])->name('capturePost');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('absen/index');
    return redirect('/absen');
})->name('dashboard');
