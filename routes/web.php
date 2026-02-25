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

Route::get('/', function () {
    return view('pages.home');
})->name('home');
Route::get('/about', function () {
    return view('pages.aboutus.aboutus');
})->name('about');
Route::get('/case-study', function () {
    return view('pages.casestudy.casestudy');
})->name('casestudy');
Route::get('/contact', function () {
    return view('pages.contactus.contactus');
})->name('contact');
