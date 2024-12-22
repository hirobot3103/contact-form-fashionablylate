<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

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

// 問い合わせフォーム関連
Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/confirm/store', [ContactController::class, 'store'])->name('store');
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');

// 管理画面関連
Route::middleware('auth')->group(function () {
   Route::get('/admin', [AuthController::class, 'index']);
   Route::post('/admin/search', [AuthController::class, 'search'])->name('search');
   Route::get('/admin/delete', [AuthController::class, 'delete'])->name('delete');
});