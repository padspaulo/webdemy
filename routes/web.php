<?php

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

use App\Series;

Route::get('/', [App\Http\Controllers\ContactController::class, 'contact']);
Route::post('/', [App\Http\Controllers\ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/front', function () {
    $featuredSeries = Series::take(3)->latest()->get();
    return view('front', compact('featuredSeries'));
})->name('front')->middleware('auth');

Auth::routes();

Route::get('/', [App\Http\Controllers\PrincipalController::class, 'index'])
    ->name('principal');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/series', 'SeriesController')->middleware('auth');
Route::get('/series/{series}/episodes/{episodeNumber}', 'SeriesController@episode')->name('series.episode')->middleware(['auth','check-subscription']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('payment', 'PaymentController@payment');
Route::post('subscribe', 'PaymentController@subscribe');
