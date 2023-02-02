<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', function () {

    return Auth::user()->roles()->first()->name == 'admin' ? view('dasboardadmin') : view('dashboard');
   
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/course', function () {
    return Auth::user()->roles()->first()->name == 'admin' ? view('course'): abort(403);
})->middleware(['auth', 'verified'])->name('course'); 

Route::get('/mentoradmin', function () {
    return view('mentoradmin');
})->middleware(['auth', 'verified'])->name('mentoradmin');

Route::get('/mentoruser', function () {
    return view('mentoruser');
})->middleware(['auth', 'verified'])->name('mentoruser');

Route::controller(App\Http\Controllers\daftarControler::class)->group(function () {
  
    route::get('/daftars', 'index');
    route::get('/daftar', 'create');
    route::post('/daftar', 'store'); 
    route::get('/edit-daftar/{daftar_id}', 'edit');
    route::put('/update-daftar/{daftar_id}', 'update');
    Route::delete('/delete-daftar/{daftar_id}', 'destroy');

});

Route::controller(App\Http\Controllers\MentorController::class)->group(function () {
  
    route::get('/mentor', 'create');
    route::post('/mentor', 'store'); 
    route::get('/mentors', 'index');
    route::get('/edit-mentor/{mentor_id}', 'edit');
    route::put('/update-mentor/{mentor_id}', 'update');
    Route::delete('/delete-mentor/{mentor_id}', 'destroy');
   

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
