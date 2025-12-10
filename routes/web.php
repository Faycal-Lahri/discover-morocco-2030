<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin_morocco_2030')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Media Routes
    Route::get('media', [App\Http\Controllers\Admin\MediaController::class, 'index'])->name('media.index');
    Route::post('media', [App\Http\Controllers\Admin\MediaController::class, 'store'])->name('media.store');
    Route::delete('media/{media}', [App\Http\Controllers\Admin\MediaController::class, 'destroy'])->name('media.destroy');

    // Resource Routes
    Route::resource('cities', App\Http\Controllers\Admin\CityController::class);
    Route::resource('destinations', App\Http\Controllers\Admin\DestinationController::class);
    Route::resource('city-paragraphs', App\Http\Controllers\Admin\CityParagraphController::class);
    Route::resource('destination-paragraphs', App\Http\Controllers\Admin\DestinationParagraphController::class);
    Route::resource('volontaires', App\Http\Controllers\Admin\VolontaireController::class);
    Route::resource('commentaires', App\Http\Controllers\Admin\CommentaireController::class);
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class);
    Route::get('newsletters/export', [App\Http\Controllers\Admin\NewsletterController::class, 'exportCsv'])->name('newsletters.export');
    Route::resource('newsletters', App\Http\Controllers\Admin\NewsletterController::class);
    Route::get('report/generate', [App\Http\Controllers\Admin\ReportController::class, 'generate'])->name('report.generate');
    
    // Activities
    Route::get('activities', [App\Http\Controllers\Admin\ActivityController::class, 'index'])->name('activities.index');
});
