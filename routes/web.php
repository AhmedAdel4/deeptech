<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
// dd(phpinfo());
Route::get('install', function() {
    Artisan::call('migrate');
    Artisan::call('optimize:clear');
    return Artisan::output();
});

Route::get('/admin', function () {
    return redirect(route('home'));
});
Route::get('/', [HomeController::class, 'index'])->name('homePage');
Route::get('/about-details', [HomeController::class, 'aboutDetails'])->name('aboutDetails');
Route::get('/service-details/{service}', [HomeController::class, 'serviceDetails'])->name('serviceDetails');
Route::post('/userMessage', [HomeController::class, 'userMessage'])->name('userMessage');



