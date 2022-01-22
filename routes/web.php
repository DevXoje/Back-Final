<?php

use App\Http\Controllers\UserController;
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

Route::get('/users', function () {
	$users = User::orderBy('name')->get();

	return view('users.index');
});

Route::get('/', fn () => view('home'))->name('home');

Route::resource('users', UserController::class)->except(['show']); /* ->only(['index', 'show', 'create', 'edit', 'destroy']);*/
Route::get('/users/{post}', [UserController::class, 'show'])->name('users.show')->where('post', '[0-9]+');

Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
/* Route::get('/users/editTest/{id}', [UserController::class, 'editTest'])->name('users.edit_test');
Route::get('/users/newTest', [PostContUserControllerroller::class, 'newTest'])->name('users.new_test'); */
