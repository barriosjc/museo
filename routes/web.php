<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\museoController;
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

Route::get('/', [museoController::class, "index"])->name('cuadro.index');
Route::get('/buscar', [museoController::class, "buscar"])->name('cuadro.buscar');
Route::get('/tiempo', [museoController::class, "tiempo"])->name('cuadro.tiempo');

