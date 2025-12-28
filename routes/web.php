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
    $comments = \App\Models\Commentaire::latest()->take(7)->get();
    return view('home', compact('comments'));
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/faqs', function () {
    $categories = \App\Models\Faq::where('is_active', true)
        ->get()
        ->groupBy('category');

    // Get unique category names for the sidebar navigation
    $categoryList = $categories->keys();

    return view('faqs', compact('categories', 'categoryList'));
})->name('faqs');

Route::get('/volunteer', function () {
    return view('volunteer');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cities', [App\Http\Controllers\CityController::class, 'index'])->name('cities');

Route::get('/cities/{city}', [App\Http\Controllers\CityController::class, 'show'])->name('cities.show');

Route::get('/partners/content-hub', [App\Http\Controllers\PartnerController::class, 'contentHub'])->name('partners.hub');
Route::get('/partners/tools', [App\Http\Controllers\PartnerController::class, 'tools'])->name('partners.tools');

// Public Form Routes
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::post('/volunteer', [App\Http\Controllers\VolunteerController::class, 'store'])->name('volunteer.store');
Route::post('/newsletter', [App\Http\Controllers\NewsletterController::class, 'store'])->name('newsletter.store');
Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

// Admin routes
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
    Route::resource('faqs', App\Http\Controllers\Admin\FaqController::class);
    Route::get('newsletters/export', [App\Http\Controllers\Admin\NewsletterController::class, 'exportCsv'])->name('newsletters.export');
    Route::resource('newsletters', App\Http\Controllers\Admin\NewsletterController::class);
    Route::get('report/generate', [App\Http\Controllers\Admin\ReportController::class, 'generate'])->name('report.generate');

    // Destination Images
    Route::delete('destination-images/{destinationImage}', [App\Http\Controllers\Admin\DestinationImageController::class, 'destroy'])->name('destination-images.destroy');

    // Destination Videos
    Route::delete('destinations/{destination}/video', [App\Http\Controllers\Admin\DestinationController::class, 'deleteVideo'])->name('destinations.video.delete');

    // Activities
    Route::get('activities', [App\Http\Controllers\Admin\ActivityController::class, 'index'])->name('activities.index');
});
