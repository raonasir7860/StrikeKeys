<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::post('user/update/{id}', [HomeController::class,'profile_update']);


// Admin Routes

Route::get('admin/home', [HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/create-user', [HomeController::class,'create_user'])->middleware('is_admin');
Route::post('admin/store-user', [HomeController::class,'store_user'])->middleware('is_admin');
Route::post('admin/user/delete/{id}', [HomeController::class,'destroy'])->middleware('is_admin');
Route::get('admin/user/edit/{id}', [HomeController::class,'edit_user'])->middleware('is_admin');
Route::post('admin/user/update/{id}', [HomeController::class,'update_user'])->middleware('is_admin');

Route::get('/admin/profile', [HomeController::class,'admin_profile'])->middleware('is_admin');


