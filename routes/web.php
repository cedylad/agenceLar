<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropretyController;
use App\Http\Controllers\Admin\OptionController;

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

$idRegex = '[0-9]+';
$slugregex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [\App\Http\Controllers\PropretyController::class, 'index'])->name('proprety.index');
Route::get('/biens/{slug}-{proprety}', [\App\Http\Controllers\PropretyController::class, 'show'])->name('proprety.show')->where([
    'proprety' => $idRegex,
    'slug' => $slugregex
]);

Route::post('/biens/{proprety}/contact', [\App\Http\Controllers\PropretyController::class, 'contact'])->name('proprety.contact')->where([
    'proprety' => $idRegex
]);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'doLogin']);
Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('proprety', \App\Http\Controllers\Admin\PropretyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
