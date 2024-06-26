<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Home route
Route::get('/', function () {
    return view('index');
})->name('home');

// About page route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services page route
Route::get('/services', function () {
    return view('services');
})->name('services');

// Services page route
Route::get('/projects', function () {
    return view('projects');
})->name('projects');


// Blog routes
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');

// Pages routes
Route::get('/price', function () {
    return view('price');
})->name('price');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

Route::get('/quote', function () {
    return view('quote');
})->name('quote');

// Contact page route
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/pages/{slug}', 'PageController@show')->name('pages.show');

Route::get('/page/{id}', [PageController::class, 'show'])->name('page.preview');

// routes/web.php or routes/api.php
Route::post('/pages/{page}/preview', [App\Orchid\Screens\Pages\PageEditScreen::class, 'preview'])->name('pages.preview');
