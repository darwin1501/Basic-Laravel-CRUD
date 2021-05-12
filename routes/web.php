<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrdersController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home', ['checkDuplicates'=>'no error']);
// })->name('home');
Route::get('/', [UsersController::class, 'getAllUser'])->name('home');
Route::delete('/{user}', [UsersController::class, 'deleteUser'])->name('delete');
Route::post('/post', [UsersController::class, 'post'])->name('home.post');
Route::get('/edit/{user}', [UsersController::class, 'editUser'])->name('edit');
Route::post('/edit/post/{user:name}', [UsersController::class, 'updateUser'])->name('edit.post');

Route::get('/profile/{user:name}', [ProfileController::class, 'userInfo'])->name('profile');

Route::get('/addOrder', [OrdersController::class, 'addOrder'])->name('order');
Route::post('/addOrder', [OrdersController::class, 'saveOrder'])->name('order.post');

Route::get('/order/edit/{order}', [OrdersController::class, 'editOrder'])->name('order.edit');
Route::post('/order/update/{order}', [OrdersController::class, 'updateOrder'])->name('order.update');
Route::delete('/order/delete/{order}', [OrdersController::class, 'deleteOrder'])->name('order.delete');
