<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('admin',function(){
    return view('admin');
})->name('admin')->middleware('admin');
Route::get('hr',function(){
    return view('hr');
})->name('hr')->middleware('hr');
Route::get('staff',function(){
    return view('staff');
})->name('staff')->middleware('staff');
