<?php

use App\Http\Controllers\RelatorioControlle;
use App\Http\Controllers\UserController;
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

Route::get('/listar', [UserController::class,'listar']);

Route::get('/compilar', [RelatorioControlle::class, 'compilar'])->name('compilar');

Route::post('/gerar', [RelatorioControlle::class, 'gerar'])->name('gerar');

Route::get('/getid', [RelatorioControlle::class, 'getId'])->name('getId');
