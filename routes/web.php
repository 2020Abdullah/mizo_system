<?php

use App\Http\Controllers\Api\AuthController;
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
    return view('qrCode');
});

Route::get('/menu', function () {
    return view('welcome');
})->name('menu');

Route::get('/{pathMatch}', function(){
    return view('welcome');
})->where('pathMatch', '.*');
