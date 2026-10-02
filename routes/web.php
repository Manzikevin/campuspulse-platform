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

Route::post('/logout',function(){

})->name('logout');

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

Route::prefix('student')->name('student.')->group(function () {

    // Dashboard / Personalized Feed
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');

    // Notice Discovery Archive
    Route::get('/notices', function () {
        return view('student.notices.index');
    })->name('notices.index');

    // Single Notice Detail
    Route::get('/notices/{id}', function ($id) {
        // You will pass the actual Notice model instance here:
        // $notice = Notice::findOrFail($id);
        // return view('student.notices.show', compact('notice'));
        return view('student.notices.show');
    })->name('notices.show');

    // Bookmarks Index
    Route::get('/bookmarks', function () {
        return view('student.bookmarks.index');
    })->name('bookmarks.index');

    // Academic Profile Settings
    Route::get('/profile', function () {
        return view('student.profile.show');
    })->name('profile.show');

    Route::post('/profile', function () {
        // Handle saving academic profile preferences (Faculty, Department, Cohort)
        return back()->with('status', 'Academic preferences updated successfully.');
    })->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Notice Admin Portal Routes (Authenticated + Notice Admin Role)
|--------------------------------------------------------------------------
*/

Route::prefix('notice-admin')->name('notice-admin.')->group(function () {
    
    // Dashboard / Engagement Analytics Overview
    Route::get('/dashboard', function () {
        return view('notice-admin.dashboard');
    })->name('dashboard');

    // University Notices Management Index
    Route::get('/notices', function () {
        return view('notice-admin.notices.index');
    })->name('notices.index');

    // Create Notice Form
    Route::get('/notices/create', function () {
        return view('notice-admin.notices.create');
    })->name('notices.create');

    // Single Notice Detail / Analytics View
    Route::get('/notices/{id}', function ($id) {
        return view('notice-admin.notices.show');
    })->name('notices.show');

    // Categories & Taxonomies Index
    Route::get('/categories', function () {
        return view('notice-admin.categories.index');
    })->name('categories.index');

});
