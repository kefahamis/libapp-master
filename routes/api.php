<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CPDController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\API\Hr\CoursesController;
use App\Http\Controllers\API\User\SubscriptionController as UserSubscriptionController;
use App\Http\Controllers\SubscriptionUserController;

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


Route::get('about', function (Request $request) {

    return response()->json(['status' => 'success', 'about' => 'Liberator App. Api Ver 1.0.0'], 200);
});

// Route::middleware(['api', 'auth:sanctum'])->group(function () {

//     Route::get('user-auth/logout', [UserController::class, 'logout']);
//     Route::get('user-auth/deactivate', [UserController::class, 'deactivate']);

//     Route::resource('courses', CourseController::class);
//     Route::resource('bookings', BookingController::class);

//     Route::get('cpd', [CPDController::class, 'index']);

//     Route::get('subscription-users', [SubscriptionUserController::class, 'index']);
//     Route::get('subscription-users/active', [SubscriptionUserController::class, 'index']);

//     //Hr
//     Route::get('hr/courses', [CoursesController::class, 'index']);
//     Route::get('hr/courses?courses=Draft', [CoursesController::class, 'index']);
//     Route::get('hr/courses?courses=Published', [CoursesController::class, 'index']);
//     Route::get('hr/courses/{course_id}', [CoursesController::class, 'show']);
//     Route::put('hr/courses/{course_id}', [CoursesController::class, 'update']);

//     //User
//     Route::get('subscriptions', [UserSubscriptionController::class, 'index']);
//     Route::get('subscriptions/{subscription}', [UserSubscriptionController::class, 'show']);
//     Route::post('subscriptions/{subscription}', [UserSubscriptionController::class, 'subscribe']);
// });

# Auth
Route::post('user-auth/register', [UserController::class, 'register']);
Route::post('user-auth/login', [UserController::class, 'login']);

Route::get('subscriptions', [UserSubscriptionController::class, 'index']);
Route::get('hr/courses', [CoursesController::class, 'index']);