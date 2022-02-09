<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::post('/store/user', [\App\Http\Controllers\HomeController::class, 'store_user'])->name('user.store');
Route::get('/edit/user', [\App\Http\Controllers\HomeController::class, 'edit_user'])->name('user.edit');
Route::post('/update/user', [\App\Http\Controllers\HomeController::class, 'update_user'])->name('user.update');
Route::get('/destroy/user/{id}', [\App\Http\Controllers\HomeController::class, 'destroy_user'])->name('user.destroy');
Route::get('/update/user/status', [\App\Http\Controllers\HomeController::class, 'update_user_status'])->name('user.status.update');
Route::post('/update/user/password/{id}', [\App\Http\Controllers\HomeController::class, 'update_user_password'])->name('user.password.update');
Route::get('/profile/{id}', [\App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/update/image/{id}', [\App\Http\Controllers\HomeController::class, 'update_image'])->name('update.image');
//search user
Route::get('/search', [\App\Http\Controllers\HomeController::class, 'search'])->name('search');
