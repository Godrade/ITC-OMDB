<?php

use App\Http\Controllers\PagesController;
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

Route::group(['middleware' => ['ForceSSL']], function () {
    Route::get('/', [PagesController::class, 'index'])->name('app.index');
    Route::post('/search/', [PagesController::class, 'search'])->name('app.search');
});
