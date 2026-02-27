<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


// Clear cache route
Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Application cache cleared!";
});

// ── Public Routes ──
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about-us', function () {
    return view('pages.aboutus.aboutus');
})->name('about');

Route::get('/case-studies', function () {
    return view('pages.casestudy.casestudy');
})->name('casestudy');

Route::get('/contact-us', function () {
    return view('pages.contactus.contactus');
})->name('contact');


// ── Admin Login (public — no auth) ──
Route::get('/admin/login', fn() => view('admin.login'))->name('admin.login');
Route::post('/admin/login', fn() => redirect(route('admin.dashboard')))->name('admin.login.post');

//
// Admin Routes
// All views live inside: resources/views/pages/admin/
// ── Admin Login (public — no auth) ──

//
Route::prefix('admin')->name('admin.')->group(function () {

    // views/pages/admin/dashboard.blade.php
    Route::get('/', fn() => view('pages.admin.dashboard'))->name('dashboard');

    // views/pages/admin/pages/home.blade.php etc.
    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/home',         fn() => view('pages.admin.pages.home'))->name('home');
        Route::get('/about',        fn() => view('pages.admin.pages.about'))->name('about');
        Route::get('/case-studies', fn() => view('pages.admin.pages.casestudies'))->name('casestudies');
        Route::get('/contact',      fn() => view('pages.admin.pages.contact'))->name('contact');
    });

    // views/pages/admin/casestudies/index.blade.php etc.
    Route::prefix('case-studies')->name('casestudies.')->group(function () {
        Route::get('/',           fn() => view('pages.admin.casestudies.index'))->name('index');
        Route::get('/create',     fn() => view('pages.admin.casestudies.create'))->name('create');
        Route::get('/categories', fn() => view('pages.admin.casestudies.categories'))->name('categories');
    });

    // views/pages/admin/testimonials/
    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/',       fn() => view('pages.admin.testimonials.index'))->name('index');
        Route::get('/create', fn() => view('pages.admin.testimonials.create'))->name('create');
    });

    // views/pages/admin/partners/
    Route::prefix('partners')->name('partners.')->group(function () {
        Route::get('/', fn() => view('pages.admin.partners.index'))->name('index');
    });

    // views/pages/admin/consultations/
    Route::prefix('consultations')->name('consultations.')->group(function () {
        Route::get('/', fn() => view('pages.admin.consultations.index'))->name('index');
    });

    // views/pages/admin/contacts/
    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', fn() => view('pages.admin.contacts.index'))->name('index');
    });

    // views/pages/admin/settings/
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/general', fn() => view('pages.admin.settings.general'))->name('general');
        Route::get('/seo',     fn() => view('pages.admin.settings.seo'))->name('seo');
        Route::get('/social',  fn() => view('pages.admin.settings.social'))->name('social');
    });

    // views/pages/admin/users/
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/',       fn() => view('pages.admin.users.index'))->name('index');
        Route::get('/create', fn() => view('pages.admin.users.create'))->name('create');
    });

    Route::get('/profile', fn() => view('pages.admin.profile'))->name('profile');
    Route::get('/logout',  fn() => redirect('/'))->name('logout');
});
