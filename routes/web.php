<?php

use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\GetUserController;
use App\Http\Controllers\UpdateUserController;
use App\Models\User;
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

Route::get('users', GetUserController::class)->name('users');
/* Route::delete('users', DeleteUserController::class)->name('users.delete');
Route::post('users/{id}', CreateUserController::class)->name('users.store');
Route::post('users/{id}', UpdateUserController::class)->name('users.store');
 */

/* Route::resource('users', UserController::class)->only(['index', 'update', 'store', 'destroy']);
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->where('user', '[0-9]+');

Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete'); */
/* Route::get('/users/editTest/{id}', [UserController::class, 'editTest'])->name('users.edit_test');
Route::get('/users/newTest', [PostContUserControllerroller::class, 'newTest'])->name('users.new_test'); */
