<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\TodoController;
use Illuminate\Support\Facades\Auth;
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


// Auth::loginUsingId(1);
// Auth::logout();
Route::get('/', function () {
  return view('pages.home.index');
})->name('home');

Route::group(['middleware' => 'guest'], function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login.index');
  Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
  Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
  Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
});

Route::group(['middleware' => 'auth'], function () {
  Route::post('/logout', LogoutController::class)->name('logout');
  Route::resource('/todo', TodoController::class);
  Route::put('/todo/{todo}/completed', [TodoController::class, 'completed'])->name('todo.completed');
});
