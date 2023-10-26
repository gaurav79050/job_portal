<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
})->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [RegisterController::class, 'index']);



Route::get('/login', function () {
   

    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'index']);

Route::get('/filterproperty', [PropertyController::class, 'filterproperty']);
Route::get('/property/{id}', [PropertyController::class, 'getProperty']);


Route::middleware(['user_role'])->group(function () {

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/jobdetails/{id}', [JobController::class, 'showjob'])->name('jobdetails');
    Route::post('/applyjob', [JobController::class, 'applyjob'])->name('applyjob');
    Route::get('/profile', [UserController::class, 'profile'])->name('user_profile');
    Route::get('/editprofile/{id}', [UserController::class, 'editprofile'])->name('edit_user_profile');
    Route::put('/editprofile', [UserController::class, 'editprofile']);
});

Route::prefix('admin')->middleware(['admin_role'])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/editprofile/{id}', [AdminController::class, 'editprofile'])->name('editprofile');
    Route::put('/editprofile', [AdminController::class, 'editprofile']);
    Route::get('/jobupload', function () {
        return view('admin/jobupload');
    })->name('jobupload');
    Route::post('/jobupload', [AdminController::class, 'jobupload']);
    Route::get('/joblist', [AdminController::class, 'joblist'])->name('joblist');
    Route::get('/editjob/{id}', [AdminController::class, 'editjob'])->name('editjob');
    Route::put('/editjob', [AdminController::class, 'editjob']);
    Route::get('/deletejob/{id}', [AdminController::class, 'deletejob'])->name('deletejob');;
    Route::get('/jobdetails/{id}', [AdminController::class, 'showjob'])->name('showjob');
    Route::get('/applications', [AdminController::class, 'applications'])->name('applications');
    Route::get('/view-resume/{id}', [AdminController::class, 'viewResume'])->name('view-resume');
});

Route::get('/logout', function () {
    Auth::logout();
    session()->flush();
    return redirect('/login');
})->name('logout');

Route::get('/confirm-registration/{token}', [RegisterController::class, 'confirmation'])->name('confirm-registration');
Route::get('thank-you', function () {
    return view('thank_you');
});
