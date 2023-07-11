<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\PropretyController;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('proprety', \App\Http\Controllers\Admin\PropretyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
