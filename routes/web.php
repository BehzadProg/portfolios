<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\feedbackSettingController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinkController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUsefulLinkController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSettingController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillItemController;
use App\Http\Controllers\Admin\SkillSettingController;
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

Route::get('/', [HomeController::class , 'index'])->name('home.page');

/* About Download Resume Route */
Route::get('resume/download' , [HomeController::class , 'resumeDownload'])->name('resume.download');

Route::get('admin-panel/management/dashboard', [DashboardController::class , 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('portfolio-details/{id}', [HomeController::class , 'showPortfolio'])->name('show.portfolio');
Route::get('blog-details/{id}', [HomeController::class , 'showBlog'])->name('show.blog');
Route::get('blogs', [HomeController::class , 'blogs'])->name('blogs');
Route::post('contact-me', [HomeController::class , 'contact'])->name('contact');

Route::prefix('admin-panel/management/')->name('admin.')->group(function(){

    Route::resource('hero' , HeroController::class);
    Route::resource('typer-title' , TyperTitleController::class);

    /* Services Routes */
    Route::resource('service' , ServiceController::class);

    /* About Routes */
    Route::resource('about' , AboutController::class);

    /* Portfolio Category Routes */
    Route::resource('category' , CategoryController::class);

    /** Portfolio Items Routes */
    Route::resource('portfolio-item' , PortfolioItemController::class);

    /** Portfolio Setting Section Routes */
    Route::resource('portfolio-setting' , PortfolioSettingController::class);

    /** Skill Setting Section Route */
    Route::resource('skill-setting' , SkillSettingController::class);

    /** Skill Item Route */
    Route::resource('skill-item' , SkillItemController::class);

    /** Experience Route */
    Route::resource('experience' , ExperienceController::class);

    /** Feedback Route */
    Route::resource('feedback' , FeedbackController::class);

    /** Feedback Setting Section Route */
    Route::resource('feedback-setting' , feedbackSettingController::class);

    /** Blog Category Route */
    Route::resource('blog-category' , BlogCategoryController::class);

    /** Blog Route */
    Route::resource('blog' , BlogController::class);

    /** Blog Setting Section Route */
    Route::resource('blog-setting' , BlogSettingController::class);

    /** Contact Setting Section Route */
    Route::resource('contact-setting' , ContactSettingController::class);

    /** Footer Social Link Route */
    Route::resource('footer-social-link' , FooterSocialLinkController::class);

    /** Footer Information Route */
    Route::resource('footer-info' , FooterInfoController::class);

    /** Footer Contact Info Route */
    Route::resource('footer-contact-info' , FooterContactInfoController::class);

    /** Footer Useful Link Route */
    Route::resource('footer-useful-link' , FooterUsefulLinkController::class);

    /** Footer Help Link Route */
    Route::resource('footer-help-link' , FooterHelpLinkController::class);

    /** Setting Route */
    Route::get('settings' , SettingController::class)->name('setting.index');

    /** General Setting Route */
    Route::resource('general-setting' , GeneralSettingController::class);

    /** General Setting Route */
    Route::resource('seo-setting' , SeoSettingController::class);

})->middleware(['auth', 'verified']);
