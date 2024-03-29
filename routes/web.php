<?php

use App\Http\Controllers\HumanticController;
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

Route::get('/{id?}/{saved?}', [HumanticController::class, 'dashboard']);
Route::post('/save', [HumanticController::class, 'save'])->name('save');
Route::post('/export', [HumanticController::class, 'export'])->name('export');
