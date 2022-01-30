<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Export;
use App\Http\Controllers\homepage;
use App\Http\Controllers\LogAbsenController;
use App\Http\Controllers\GeneralsettingController;
use App\Http\Controllers\WfhController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KepsekController;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');

    if (Auth::user()->jabatan=="KEPALA SEKOLAH") {
        return redirect('/kepsek/pen');
    }

    return redirect('/absen');
})->name('dashboard');

Route::get('/export',[Export::class, 'ex']);
Route::get('/',[homepage::class,'index']);
Route::get('/absen',[LogAbsenController::class,'read']);
Route::get('/galery',[LogAbsenController::class,'read2']);
Route::get('/setting', function () {
    return view('absen/setting');
    // return view('absen/capture');
});
Route::get('/dashboard2', function () {
    return view('dashboard');
    // return view('absen/capture');
});

Route::get('/vas', function () {
    $in=DB::table('users')
    ->where('id', $_GET['id'])
    ->update(['FCB' => $_GET['token']]);
    echo '<h1>Anda Sudah Terdaftar untuk menerima notifikasi dan anda bisa menutup Halaman ini</h1>';
});
// Route::get('/vas', function () {
//   $in=DB::table('users')
//   ->where('id', $_GET['id'])
//   ->update(['FCB' => $_GET['token']]);

//   return response()->json(DB::table('users')
//   ->where('id', $_GET['id'])->first(), 200);
// });
Route::get('/setupnotif', function () {
    return view('presend');
});
Route::get('/menu1', function () {
    return view('absen/menu1');
});
Route::get('/menu2', function () {
    return view('absen/menu2');
});
Route::get('/foot', function () {
    return view('assetabsen/foot');
  });
Route::get('/notifall',[GeneralsettingController::class,'nofifv2']);
Route::get('/cekupuser',[LogAbsenController::class,'cekupuser']);
// Route::get('/tesc', function () {
//     return view('absen/chart');
//     // return view('absen/capture');
// });
Route::get('/tesc',[LogAbsenController::class,'presb']);
Route::post('/req/sen1',[LogAbsenController::class,'create']);
Route::get('/req/sen2',[LogAbsenController::class,'keluar']);
Route::get('/req/sen3',[LogAbsenController::class,'cekon']);
Route::get('/req/sen4',[LogAbsenController::class,'cekon2']);
Route::get('/req/sen5',[LogAbsenController::class,'retable']);
Route::get('/dam',[LogAbsenController::class,'capture']);
Route::get('/capture2',[LogAbsenController::class,'capture2']);
Route::post('/capturePost',[LogAbsenController::class,'capturePost'])->name('capturePost');


// agus
Route::get('/kepsek/pen', [KepsekController::class, 'pen']);
Route::get('/kepsek/ten', [KepsekController::class, 'ten']);

Route::get('/pengajuan', [WfhController::class, 'index'])->name('wfh');

// leo Here
// Route::get('/wfh', [WfhController::class, 'index'])->name('wfh');
Route::post('/wfhprocess', [WfhController::class, 'add']);
Route::get('/create', [PostController::class, 'create']);
Route::post('/make', [PostController::class, 'store']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/approval', [KepsekController::class, 'show'])->name('approval');
Route::get('/yes2', [KepsekController::class, 'actionKepsexApprove'])->name('aksi');
Route::get('/no', [KepsekController::class, 'actionKepsexDelete'])->name('aksi2');


// Route::get('/approval', function(){
//     return view('kepsex.approve');
// });

// Route::resource('/artikel', [PostController::class]);
