<?php

use App\Http\Controllers\CareersController;
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

Route::get('/lang/{locale}', function (string $locale) {
    abort_unless(array_key_exists($locale, config('app.available_locales')), 404);
    session(['locale' => $locale]);
    return redirect()->back(302, [], '/');
})->name('lang.switch')->where('locale', '[a-z]{2}');

Route::post('/lang/{locale}', function (string $locale) {
    abort_unless(array_key_exists($locale, config('app.available_locales')), 404);
    session(['locale' => $locale]);
    return response()->noContent();
})->name('lang.switch.post')->where('locale', '[a-z]{2}');

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/about/history', [PagesController::class, 'history'])->name('about.history');
Route::get('/about/leadership', [PagesController::class, 'leadership'])->name('about.leadership');Route::get('/businesses/{slug}', [PagesController::class, 'business'])->name('business');
Route::get('/sustainability', [PagesController::class, 'sustainability'])->name('sustainability');
Route::get('/team', [PagesController::class, 'team'])->name('team');
Route::get('/news', [PagesController::class, 'news'])->name('news');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Route::get('/careers',        [CareersController::class, 'index'])->name('careers.index');
Route::get('/careers/{slug}', [CareersController::class, 'show'])->name('careers.show')
    ->where('slug', '[a-z0-9\-]+');
Route::post('/careers/apply', [CareersController::class, 'apply'])->name('careers.apply')
    ->middleware('throttle:5,1');

/* Video streaming — BinaryFileResponse handles HTTP Range / 206 Partial Content,
   which the PHP built-in server (artisan serve) cannot do via public/ directly. */
Route::get('/media/video/{name}', function (string $name) {
    $allowed = [
        'coffee-legacy.mp4',
        'coffee-legacy-mobile.mp4',
        'coffee-legacy.webm',
    ];
    if (!in_array($name, $allowed, true)) abort(404);
    $path = public_path('videos/' . $name);
    if (!file_exists($path)) abort(404);
    return response()->file($path);
})->where('name', '[a-zA-Z0-9._-]+')->name('media.video');
