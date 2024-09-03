<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\ContactUsController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserMessagesController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/lang/{lang}', function ($lang) {
    App::setlocale($lang);
    app()->setLocale($lang);
    session(['locale' => $lang]);
    return redirect()->back();
})->name('lang');

Route::middleware('local')->prefix('admin')->group(function () {
    Auth::routes();

    Route::middleware(['auth:web'])->group(function () {

        Route::get('/dashboard/home', [DashboardController::class, 'index'])->name('home');


        Route::resource('social_links', SocialLinkController::class);
        Route::resource('statistics', StatisticsController::class);

        //aboutus routes
        Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus.index');
        Route::post('aboutus/store', [AboutUsController::class, 'store'])->name('aboutus.store');

        Route::get('userMessage', [UserMessagesController::class, 'index'])->name('userMessage.index');
        Route::get('userMessage/Contacted/{id}', [UserMessagesController::class, 'contacted'])->name('userMessage.Contacted');

        //contactus routes
        Route::get('contactus', [ContactUsController::class, 'index'])->name('contactus.index');
        Route::post('contactus/store', [ContactUsController::class, 'store'])->name('contactus.store');

        //carousel routes
        Route::get('carousel', [CarouselController::class, 'index'])->name('carousel.index');
        Route::get('carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
        Route::get('carousel/{carousel}/edit', [CarouselController::class, 'edit'])->name('carousel.edit');
        Route::put('carousel/{carousel}/update', [CarouselController::class, 'update'])->name('carousel.update');
        Route::post('carousel/store', [CarouselController::class, 'store'])->name('carousel.store');
        Route::delete('carousel/{carousel}/destroy', [CarouselController::class, 'destroy'])->name('carousel.destroy');

        Route::get('team', [TeamController::class, 'index'])->name('team.index');
        Route::get('team/create', [TeamController::class, 'create'])->name('team.create');
        Route::get('team/{team}/edit', [TeamController::class, 'edit'])->name('team.edit');
        Route::put('team/{team}/update', [TeamController::class, 'update'])->name('team.update');
        Route::post('team/store', [TeamController::class, 'store'])->name('team.store');
        Route::delete('team/{team}/destroy', [TeamController::class, 'destroy'])->name('team.destroy');


        Route::get('service', [ServiceController::class, 'index'])->name('service.index');
        Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
        Route::get('service/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
        Route::put('service/update', [ServiceController::class, 'update'])->name('service.update');
        Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
        Route::delete('service/{service}/destroy', [ServiceController::class, 'destroy'])->name('service.destroy');

    });
});
