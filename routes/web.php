<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TyperTitleController;

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

Route::get('/', [HomeController::class , 'index']);
Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/blog-details', function () {
    return view('frontend.blog_details');
});
Route::get('/portfolio-details', function () {
    return view('frontend.portfolio_details');
});

/* About Download Resume Route */
Route::get('resume/download' , [HomeController::class , 'resumeDownload'])->name('resume.download');

Route::get('/dashboard', [DashboardController::class , 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin-panel/management/')->name('admin.')->group(function(){

    Route::resource('hero' , HeroController::class);
    Route::resource('typer-title' , TyperTitleController::class);

    /* Services Routes */
    Route::resource('service' , ServiceController::class);

    /* About Routes */
    Route::resource('about' , AboutController::class);

    /* Category Routes */
    Route::resource('category' , CategoryController::class);
})->middleware(['auth', 'verified']);
