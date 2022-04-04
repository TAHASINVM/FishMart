<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\FishHistoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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
    Route::get('/admin/profile',[AdminController::class,'profile']);

    Route::get('/admin/fish',[FishController::class,'index']);
    Route::get('/admin/fish/add_fish',[FishController::class,'add_fish']);
    Route::post('/admin/fish/add_fish_process',[FishController::class,'add_fish_process']);
    Route::get('/admin/fish/edit_fish/{id}',[FishController::class,'edit_fish']);
    Route::post('/admin/fish/edit_fish_process/{id}',[FishController::class,'edit_fish_process']);
    Route::get('/admin/fish/delete/{id}',[FishController::class,'delete']);

    Route::get('/admin/today_fish',[FishHistoryController::class,'index']);
    Route::post('/admin/today_fish/add',[FishHistoryController::class,'add']);
    Route::get('/admin/today_fish/status/{id}/{status}',[FishHistoryController::class,'change_status']);
    Route::get('/admin/today_fish/record_get',[FishHistoryController::class,'edit_record']);
    Route::post('/admin/today_fish/record_update',[FishHistoryController::class,'update_record']);
    Route::get('/admin/today_fish/remove/{id}',[FishHistoryController::class,'delete']);

    Route::get('/admin/category',[CategoryController::class,'index']);
    Route::get('/admin/category/add_category',[CategoryController::class,'add_category']);
    Route::post('/admin/category/add_category_process',[CategoryController::class,'add_category_process']);
    Route::get('/admin/category/delete/{id}',[CategoryController::class,'delete']);

    Route::get('/admin/history',[FishHistoryController::class,'history']);
    Route::post('/admin/history/get_history',[FishHistoryController::class,'get_history']);

    Route::get('/admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_NAME');
        session()->forget('ADMIN_IMAGE');
        return redirect('admin/login');
    });
});


Route::get('/',[HomeController::class,'index']);


