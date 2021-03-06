<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\CartController;
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

//Register

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Login

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

//Forget password

Route::get('/forget-password', [ForgetPasswordController::class, 'index'])->name('forget-password');
Route::post('/forget-password', [ForgetPasswordController::class, 'store']);
Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'sendLink'])->name('password.reset');
Route::post('/reset-password', [ForgetPasswordController::class, 'updatePassword'])->name('password.update');

///Update data

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/update-data', [ProfileController::class, 'store'])->name('update.data');

Route::get('/update-password', [UpdatePasswordController::class, 'index'])->name('update-password');
Route::post('/update-password', [UpdatePasswordController::class, 'store']);

Route::get('/', function () {
    return view('welcome')->with(['title' => 'Home']);
})->name('home');

Route::middleware('auth')->group(function () {

    ///Logout

    Route::delete('/logout', [LogoutController::class, 'destroy'])->name('logout');

    ///Cake

    Route::get('/admin/add-cake', [CakeController::class, 'addCake'])->name('add.cake');
    Route::post('/cakes', [CakeController::class, 'create']);
    Route::get('/cakes/{cake}/update', [CakeController::class, 'updateCake'])->name('update.cake.view');
    Route::patch('/cakes/{cake}', [CakeController::class, 'update'])->name('update.cake');
    Route::delete('/cakes/{cake}', [CakeController::class, 'destroy']);

    ///User

    Route::get('admin/actives', [UserController::class, 'getActiveUsers'])->name('get.actives');
    Route::get('admin/allusers', [UserController::class, 'getAllUsers'])->name('get.users');
    Route::get('admin/users', [UserController::class, 'addUserView'])->name('add.view');
    Route::post('admin/users', [UserController::class, 'store'])->name('add.user');
    Route::get('admin/users/{id}', [UserController::class, 'show'])->name('show.user');
    Route::get('admin/users/{id}/update', [UserController::class, 'updateView'])->name('update.user.view');
    Route::patch('admin/users/{id}', [UserController::class, 'update'])->name('update.user');
    Route::patch('admin/users/{id}/deactivate', [UserController::class, 'deactivate'])->name('deactivate.user');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('destroy.user');

});

////////////Cakes

Route::get('/cakes/occasion/{category?}', [CakeController::class, 'index'])->name('cakes');
Route::get('/cakes/best-selling', [CakeController::class, 'getBestSelling'])->name('cakes.bestselling');
Route::get('/cakes/{cake}', [CakeController::class, 'show'])->name('show.cake');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
