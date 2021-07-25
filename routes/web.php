<?php

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

Route::get('/ajax_todo', function () {
    return view('ajax_todo/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');


Route::get('/ajax_todo', [App\Http\Controllers\TodoController::class, 'index'])->name('ajax_todo');
Route::post('/add_todo', [App\Http\Controllers\TodoController::class, 'create'])->name('add_todo');
Route::post('/delete_todo', [App\Http\Controllers\TodoController::class, 'delete'])->name('delete_todo');
Route::post('/update_todo', [App\Http\Controllers\TodoController::class, 'update'])->name('update_todo');

Route::get('/form_validation', [App\Http\Controllers\FormController::class, 'index'])->name('form_validation');
Route::post('/form_validation', [App\Http\Controllers\FormController::class, 'store'])->name('form_validation');
