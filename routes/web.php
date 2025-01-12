<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\clientsController;
use App\Http\Controllers\admin\lawyerController;

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

Route::get('/', function () {
    return view('welcome');
});


// إضافة مسار لتسجيل الدخول للمشرفين فقط
Route::get('/admin', function () {
    return view('admin.login');
})->name('admin');


Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');



Route::post('/admin/login', [AdminLogin::class, 'login'])->name('admin.login');

// clients routes
Route::prefix('admin')->group(function () {
    Route::resource('/clients', clientsController::class);
});



// lawyers routes
Route::prefix('admin')->group(function () {
    Route::resource('/lawyers', lawyerController::class);
});
