<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('index');
Route::any('/grid', [HomeController::class, 'grid'])->name('grid');
Route::post('/add', [HomeController::class, 'add'])->name('add');
Route::any('/get_details', [HomeController::class, 'get_details'])->name('get_details');
