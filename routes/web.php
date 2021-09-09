<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/schedules', [App\Http\Controllers\ScheduleController::class, 'index'])->name('index:schedule')->middleware('auth');
Route::get('/schedules/create', [App\Http\Controllers\ScheduleController::class, 'create'])->name('create:schedule')->middleware('auth');
Route::post('/schedules/store', [App\Http\Controllers\ScheduleController::class, 'store'])->name('store:schedule')->middleware('auth');
Route::get('/schedules/{schedule}', [App\Http\Controllers\ScheduleController::class, 'show'])->name('show:schedule')->middleware('auth');
Route::get('/schedules/{schedule}/edit', [App\Http\Controllers\ScheduleController::class, 'edit'])->name('edit:schedule')->middleware('auth');
Route::post('/schedules/{schedule}/update', [App\Http\Controllers\ScheduleController::class, 'update'])->name('update:schedule')->middleware('auth');
Route::get('/schedules/{schedule}/destroy', [App\Http\Controllers\ScheduleController::class, 'destroy'])->name('destroy:schedule')->middleware('auth');
Route::get('/schedules/{schedule}/force/destroy', [App\Http\Controllers\ScheduleController::class, 'forceDestroy'])->name('force:destroy:schedule')->middleware('auth');

Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('index:car')->middleware('auth');
Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('create:car')->middleware('auth');
Route::post('/cars/store', [App\Http\Controllers\CarController::class, 'store'])->name('store:car')->middleware('auth');
Route::get('/cars/{car}', [App\Http\Controllers\CarController::class, 'show'])->name('show:car')->middleware('auth');
Route::get('/cars/{car}/edit', [App\Http\Controllers\CarController::class, 'edit'])->name('edit:car')->middleware('auth');
Route::post('/cars/{car}/update', [App\Http\Controllers\CarController::class, 'update'])->name('update:car')->middleware('auth');
Route::get('/cars/{car}/destroy', [App\Http\Controllers\CarController::class, 'destroy'])->name('destroy:car')->middleware('auth');
Route::get('/cars/{car}/force/destroy', [App\Http\Controllers\CarController::class, 'forceDestroy'])->name('force:destroy:car')->middleware('auth');
