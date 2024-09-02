<?php

use App\Http\Controllers\Api\V1\ContactUsController;
use App\Http\Controllers\Api\V1\LookupController;
use App\Http\Controllers\Api\V1\ProjectContactController;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\ReviewController;
use App\Http\Controllers\Api\V1\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('Contactus/store', [ContactUsController::class, 'send'])->name('Contactus.store');
Route::post('ProjectContact/store', [ProjectContactController::class, 'send'])->name('ProjectContact.store');
Route::post('Review/store', [ReviewController::class, 'send'])->name('Review.store');
Route::post('GeneralReview/store', [ReviewController::class, 'GeneralSend'])->name('GeneralReview.store');
Route::get('ProjectReview', [ReviewController::class, 'getProjectReview'])->name('Review.getProjectReview');
Route::get('GeneralReview', [ReviewController::class, 'getGeneralReview'])->name('Review.getGeneralReview');
Route::get('lookups', [LookupController::class,'lookup'])->name('lookup');
Route::get('utilities', [LookupController::class,'utilities'])->name('utilities');
Route::get('employees', [LookupController::class,'employees'])->name('employees');
Route::get('project/{project}', [ProjectController::class,'show'])->name('project.show');
Route::get('Projects', [ProjectController::class,'index'])->name('project.index');
Route::get('search', [SearchController::class,'search'])->name('search');
