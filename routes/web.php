<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\ItemController::class, 'index'])->name('home');

// Item Controller and Route
Route::get('Admin/item',[App\Http\Controllers\ItemController::class, 'index']);
Route::get('Admin/addItem',[App\Http\Controllers\ItemController::class, 'addItemindex']);
Route::post('Admin/item/addItem',[App\Http\Controllers\ItemController::class, 'assign']);
Route::get('Admin/editItem/{id}',[App\Http\Controllers\ItemController::class,'edit']);
Route::post('Admin/updateItem/{id}',[App\Http\Controllers\ItemController::class,'update']);
Route::get('Admin/deleteItem/{id}',[App\Http\Controllers\ItemController::class,'delete']);


//category Controller and route
Route::get('Admin/category',[App\Http\Controllers\CategoryController::class, 'index']);
Route::get('Admin/addCategory',[App\Http\Controllers\CategoryController::class, 'addCategoryindex']);
Route::post('category/addCategory',[App\Http\Controllers\CategoryController::class, 'assign']);
Route::get('Admin/editCategory/{id}',[App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('Admin/updateCategory/{id}',[App\Http\Controllers\CategoryController::class, 'update']);
Route::get('Admin/deleteCategory/{id}',[App\Http\Controllers\CategoryController::class, 'delete']);

//Show rows
Route::post('Admin/rows',[App\Http\Controllers\CategoryController::class, 'showRows']);

