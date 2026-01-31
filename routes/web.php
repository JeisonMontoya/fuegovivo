<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::post('/register-landing', \App\Http\Controllers\LandingRegisterController::class)->name('landing.register');
