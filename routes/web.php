<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\Admin\ContactUsController as AdminContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Middleware\EnsureAdminAuthenticated;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


// ── Dev Utility ──
Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return 'Application cache cleared!';
});


// ── Public Routes ──
Route::get('/', fn() => view('pages.home'))->name('home');
Route::get('/about-us', fn() => view('pages.aboutus.aboutus'))->name('about');
Route::get('/case-studies', fn() => view('pages.casestudy.casestudy'))->name('casestudy');
Route::get('/contact-us', fn() => view('pages.contactus.contactus'))->name('contact');

// ── Public: Consultation form submission (modal AJAX) ──
Route::post('/consultations', [ConsultationController::class, 'store'])->name('consultations.store');

// ── Public: Contact-us form submission (AJAX) ──
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');


// ── Admin Auth (guest — redirects if already logged in) ──
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});


// ── Admin Panel (protected) ──
Route::prefix('admin')->name('admin.')->middleware(EnsureAdminAuthenticated::class)->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Pages
    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/home',         fn() => view('pages.admin.pages.home'))->name('home');
        Route::get('/about',        fn() => view('pages.admin.pages.about'))->name('about');
        Route::get('/case-studies', fn() => view('pages.admin.pages.casestudies'))->name('casestudies');
        Route::get('/contact',      fn() => view('pages.admin.pages.contact'))->name('contact');
    });

    // Case Studies
    Route::prefix('case-studies')->name('casestudies.')->group(function () {
        Route::get('/',           fn() => view('pages.admin.casestudies.index'))->name('index');
        Route::get('/create',     fn() => view('pages.admin.casestudies.create'))->name('create');
        Route::get('/categories', fn() => view('pages.admin.casestudies.categories'))->name('categories');
    });

    // Testimonials
    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/',       fn() => view('pages.admin.testimonials.index'))->name('index');
        Route::get('/create', fn() => view('pages.admin.testimonials.create'))->name('create');
    });

    // Partners
    Route::prefix('partners')->name('partners.')->group(function () {
        Route::get('/', fn() => view('pages.admin.partners.index'))->name('index');
    });

    // Consultations
    Route::prefix('consultations')->name('consultations.')->group(function () {
        Route::get('/',                        [AdminConsultationController::class, 'index'])->name('index');
        Route::get('/{consultation}',          [AdminConsultationController::class, 'show'])->name('show');
        Route::patch('/{consultation}/status', [AdminConsultationController::class, 'updateStatus'])->name('updateStatus');
    });

    // Contact-us submissions
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/',                [AdminContactUsController::class, 'index'])->name('index');
        Route::get('/{contact}',       [AdminContactUsController::class, 'show'])->name('show');
        Route::patch('/{contact}/status', [AdminContactUsController::class, 'updateStatus'])->name('updateStatus');
    });

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/general', fn() => view('pages.admin.settings.general'))->name('general');
        Route::get('/seo',     fn() => view('pages.admin.settings.seo'))->name('seo');
        Route::get('/social',  fn() => view('pages.admin.settings.social'))->name('social');
    });

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/',       fn() => view('pages.admin.users.index'))->name('index');
        Route::get('/create', fn() => view('pages.admin.users.create'))->name('create');
    });

    // Profile
    Route::get('/profile', fn() => view('pages.admin.profile'))->name('profile');
});
