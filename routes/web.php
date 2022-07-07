<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HasilTaniController;
use App\Http\Controllers\CaptchaServiceController;
use Illuminate\Support\Facades\Auth;
/*
| 
--
| Web Routes
| 
--
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('hasiltanis', HasilTaniController::class);
});
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/contact-form', [CaptchaServiceController::class, 'register']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

Route::get('/cetak', '\App\Http\Controllers\HasilTaniController@cetak')->name('cetak');
Route::get('/export', '\App\Http\Controllers\HasilTaniController@export')->name('export');
Route::post('home', '\App\Http\Controllers\HomeController@search');

