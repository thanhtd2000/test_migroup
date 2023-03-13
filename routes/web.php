<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;


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

Route::get("/", [AuthController::class, 'getLogin']);
Route::post("/login", [AuthController::class, 'checkLogin'])->name('checkLogin');
Route::get("/dang-ky", [AuthController::class, 'getSignup']);
Route::post("/signup", [AuthController::class, 'store'])->name('user.dangky');
Route::get("/logout", [AuthController::class, 'Logout'])->name('logout');
Route::get("/profile", [AuthController::class, 'profile']);
Route::post("/profile", [AuthController::class, 'profile'])->name('changeProfile');
Route::get("/home", [UserController::class, 'home']);

Route::middleware('checkAdmin')->prefix('admin')->group(function () {
    Route::get("/index", [UserController::class, 'index']);
    Route::prefix('categories')->group(function () {
        Route::get("/index", [CategoryController::class, 'show']);
        Route::get("/categories", [CategoryController::class, 'add']);
        Route::post("/categories", [CategoryController::class, 'add'])->name('categories.add');
        Route::get("/categories", [CategoryController::class, 'delete']);
        Route::get("/edit/{id}", [CategoryController::class, 'edit']);
        Route::put("update/{id}", [CategoryController::class, 'update'])->name('categories.update');
    });
});
