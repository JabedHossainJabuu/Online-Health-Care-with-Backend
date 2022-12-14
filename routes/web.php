<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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



Route::get('/home', [HomeController::class, 'redirect']);
Route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myAppointment', [HomeController::class, 'myAppointment']);
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);
Route::get('/show_appointment', [AdminController::class, 'show_appointment']);
Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/cancel/{id}', [AdminController::class, 'cancel']);
Route::get('/show_doctor', [AdminController::class, 'show_doctor']);
Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);
Route::get('/update_doctor/{id}', [AdminController::class, 'update_doctor']);
Route::post('/edit_doctor/{id}', [AdminController::class, 'edit_doctor']);


//Doctor
Route::get('/doctors', [HomeController::class, 'doctorPage'])->name('show.doctor');
Route::get('/about-us', [HomeController::class, 'About_us'])->name('show.about-us');
Route::get('/blogs', [HomeController::class, 'blog'])->name('show.blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('show.contact');
