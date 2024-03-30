<?php

use Illuminate\Support\Facades\Route;

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
