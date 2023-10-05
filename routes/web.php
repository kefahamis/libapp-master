<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
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
Route::get('/frontcourses', [HomeController::class, 'index'])->name('profile');
Route::get('/profile', [DashboardController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('admin', function () {
    return view('admin');
})->name('admin')->middleware('admin');
Route::get('hr', function () {
    return view('hr');
})->name('hr')->middleware('hr');
Route::get('staff', function () {
    return view('staff');
})->name('staff')->middleware('staff');

Route::get('/subscriptions', function () {
    return view('inc.contents.subscriptions');
});

Route::get('/dashboard', function () {
    return view('inc.contents.dashboard');
});

Route::get('/courses', function () {
    return view('inc.contents.courses');
});

// Route::post('/data', function () {
//     $resource = $_POST['resource'];
//     if ($resource) {
//         return view("inc.contents.$resource");
//     } else {
//         return view("inc.contents.dashboard");
//     }
// });