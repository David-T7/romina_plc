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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/about/history', [PagesController::class, 'history'])->name('about.history');
Route::get('/about/leadership', [PagesController::class, 'leadership'])->name('about.leadership');Route::get('/team', [PagesController::class, 'team'])->name('team');
Route::get('/news', [PagesController::class, 'news'])->name('news');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
