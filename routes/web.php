<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecializationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// specialization
Route::get('/specialization', [SpecializationController::class, 'index'])->name('specialization');
Route::post('/add/specialization', [SpecializationController::class, 'add'])->name('add_specialization');
Route::post('/edit/specialization/{id}', [SpecializationController::class, 'edit'])->name('edit_specialization');
Route::post('/delete/specialization/{id}', [SpecializationController::class, 'delete'])->name('delete_specialization');


// specialization
Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
Route::post('/add/doctor', [DoctorController::class, 'add'])->name('add_doctor');
Route::post('/edit/doctor/{id}', [DoctorController::class, 'edit'])->name('edit_doctor');
Route::post('/delete/doctor/{id}', [DoctorController::class, 'delete'])->name('delete_doctor');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
