<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('latihan.home');
})->name('welcome');

Route::get('/pelatihan', function () {
    return view('latihan.pelatihan');
});

Route::get('/pelatihan/{id}', function () {
    return view('latihan.pelatihan_detail');
});

Route::get('/pelatihan-saya', function () {
    return view('latihan.pelatihan');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/auth/login', function() {
//     return view('login');
// })->name('login');

// Route::post('/auth/login', [LoginController::class,'login'])->name('login');

Route::get('/auth/register', function() {
    return view('register');
});

Route::post('/auth/register', function() {
    return "proses pendaftaran";
})->name('register');

Route::get('/profil', function() {
    return "selamat datang user";
})->middleware(EnsureTokenIsValid::class);

Route::get('/admin', function() {
    return "selamat datang admin";
})->middleware([ EnsureUserHasRole::class.':admin']);

Route::resource('photos',PhotoController::class)->middleware('auth');

Route::get('/course/me', [CourseController::class,'myCourse'])->name('course.me');
Route::resource('course',CourseController::class);



require __DIR__.'/auth.php';
