<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FishController;

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


Route::get('/admin/login',[AdminController::class,'index']);
Route::post('/admin/login_process',[AdminController::class,'login_process']);
Route::get('/admin/login_process',[AdminController::class,'login_process_redirect']);


Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);

    Route::get('/admin/fish',[FishController::class,'index']);
    Route::get('/admin/fish/manage_fish',[FishController::class,'manage_fish']);
    Route::post('/admin/fish/manage_fish_process',[FishController::class,'manage_fish_process']);


    Route::get('/admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_NAME');
        return redirect('admin/login');
    });
});


