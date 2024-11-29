<?php


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

Route::resource('job-applications', JobApplicationController::class)->only(['store']);

Route::get('profile',[ProfileController::class,'index'])->name('profile')->middleware('IsAuth');
Route::put('profile',[ProfileController::class,'update'])->name('profile.update')->middleware('IsAuth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

// Route::get('/testing', function () {
//     return view('theme.pages.job-detail');
// });


// Route::get('/test', function () {
//     return view('theme.pages.job-detail');
// });
