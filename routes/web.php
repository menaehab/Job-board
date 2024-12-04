<?php

use App\Http\Controllers\EmployerJobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', action: [HomeController::class, 'home' ])->name('home');

Route::resource( 'jobs', JobController::class);

Route::resource('job-applications', JobApplicationController::class)->only(['store','index']);

Route::prefix('profile')->middleware('IsAuth')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('profile');
    Route::put('/', 'update')->name('profile.update');
});

Route::get('my-jobs', [EmployerJobController::class, 'postedJobs'])->name('my-jobs')->middleware('auth:employer');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

Route::get('/testing', function () {
    return view('theme.pages.applies');
});


// Route::get('/test', function () {
//     return view('theme.pages.job-detail');
// });
