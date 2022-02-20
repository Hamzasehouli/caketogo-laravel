<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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

//Register

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Login

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');

//Forget password

Route::get('/forget-password', [ForgetPasswordController::class, 'index'])->name('forget-password');
Route::post('/forget-password', [ForgetPasswordController::class, 'store'])->name('forget-password');

Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'sendLink'])->name('password.reset');

Route::post('/reset-password', [ForgetPasswordController::class, 'updatePassword'])->name('password.update');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [LogoutController::class, 'destroy'])->name('logout');
});

/////Admin

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::patch('/admin/update', [AdminController::class, 'update'])->name('admin.update');
    Route::patch('/admin/reset-password', [AdminController::class, 'resetPassword'])->name('admin.resetpassword');
    Route::patch('/admin/forget-password', [AdminController::class, 'resetPassword'])->name('admin.forgetpassword');
    Route::patch('/admin/show', [AdminController::class, 'show'])->name('admin.show');
});
