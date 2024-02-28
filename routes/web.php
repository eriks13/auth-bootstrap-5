<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/simple-table', function() {
        return view('table');
    })->name('simple.index');

    Route::get('/simple-form', function() {
        return view('form');
    })->name('form.index');

});



require __DIR__.'/auth.php';

