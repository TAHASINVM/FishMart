<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\FishHistoryController;

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
    Route::get('/admin/fish/add_fish',[FishController::class,'add_fish']);
    Route::post('/admin/fish/add_fish_process',[FishController::class,'add_fish_process']);
    Route::get('/admin/fish/edit_fish/{id}',[FishController::class,'edit_fish']);
    Route::post('/admin/fish/edit_fish_process/{id}',[FishController::class,'edit_fish_process']);
    Route::get('/admin/fish/delete/{id}',[FishController::class,'delete']);

    Route::get('/admin/today_fish',[FishHistoryController::class,'index']);
    Route::post('/admin/today_fish/add',[FishHistoryController::class,'add']);


    Route::get('/admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_NAME');
        return redirect('admin/login');
    });
});


