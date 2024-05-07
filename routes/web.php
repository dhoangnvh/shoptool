<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('dashboard');
});

Route::get('etsy', [Controllers\CrawlerController::class, 'cralerEtsy']);
Route::get('setting', [Controllers\SettingSiteController::class, 'index'])->name('setting.index');
Route::post('setting', [Controllers\SettingSiteController::class, 'store'])->name('setting.store');

Route::get('crawler', [Controllers\CrawlerSiteController::class, 'index'])->name('crawler.index');
Route::get('crawler/crawler', [Controllers\CrawlerSiteController::class, 'crawler'])->name('crawler.crawler');
Route::post('crawler/create', [Controllers\CrawlerSiteController::class, 'createProduct'])->name('crawler.create');
