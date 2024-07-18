<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FoodController;
use App\Models\Category;
use App\Models\FoodList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function(){
    Route::post('createUser', [AuthController::class, 'createUser'])->name('createUser');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// category
Route::get('category/All', [CategoryController::class, 'getAllCategory'])->name('category.All');
Route::get('category/list', [CategoryController::class, 'getCategory'])->name('category.list');
Route::post('category/add', [CategoryController::class, 'addCategory'])->name('category.add');
Route::delete('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
Route::post('category/update', [CategoryController::class, 'updateCategory'])->name('category.update');

// food
Route::get('food/list', [FoodController::class, 'foodList'])->name('food.list');
Route::post('food/add', [FoodController::class, 'addFood'])->name('food.add');
Route::delete('food/delete/{id}', [FoodController::class, 'DeleteFood'])->name('food.delete');
Route::post('food/update', [FoodController::class, 'updateFood'])->name('food.update');

// getFoodList 
Route::post('getfoodList', [FoodController::class, 'getfoodList'])->name('getfoodList');

// contact update 
Route::post('contact/update', [ContactController::class, 'contactProfileUpdate'])->name('contact.update');
Route::get('getContact', [ContactController::class, 'contactProfile'])->name('getContact');

// food & category counter
Route::get('getDashboard', function(){
    $categoryCount = Category::count();
    $FoodCount = FoodList::count();
    return response()->json(['categoryCount' => $categoryCount, 'FoodCount' => $FoodCount]);
});
