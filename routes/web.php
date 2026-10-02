<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function () {
    return view('landing');
})->name('login');

Route::get('/register', function () {
    return view('landing');
})->name('register');
