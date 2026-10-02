<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('demo.request');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forogot-password');
})->name('password.request');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::get('/request-demo', function () {
    return view('demo.request');
})->name('demo.request');

Route::post('/request-demo', function (Request $request) {
    $validated = $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'institution' => 'required|string|max:255',
        'department' => 'nullable|string|max:255',
        'role' => 'required|string',
        'student_count' => 'required|string',
        'message' => 'nullable|string|max:1000',
    ]);

    // Handle saving request or dispatching email notification here...

    return back()->with('success', true);
})->name('demo.submit');
