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
Route::get('/recaptcha', [App\Http\Controllers\FormController::class, 'recaptchaIndex'])->name('recaptcha');
Route::post('/recaptcha', [App\Http\Controllers\FormController::class, 'recaptchaStore'])->name('recaptcha');

Route::get('/locale/{lang?}', [App\Http\Controllers\CommonController::class, 'localeIndex'])->name('locale');

Route::get('/queue', [App\Http\Controllers\CommonController::class, 'queueIndex'])->name('queue');
Route::get('/send_mail', [App\Http\Controllers\CommonController::class, 'sendMail'])->name('send_mail');

Route::get('/event', [App\Http\Controllers\CommonController::class, 'event'])->name('event');

Route::get('/subscribe', [App\Http\Controllers\CommonController::class, 'subscribeGate'])->name('subscribe');
Route::get('/premium', [App\Http\Controllers\CommonController::class, 'premiumPolicies'])->name('premium');

Route::get('/notification', [App\Http\Controllers\CommonController::class, 'notification'])->name('notification');
Route::get('/mark_read', [App\Http\Controllers\CommonController::class, 'markRead'])->name('mark_read');

