<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/sobre-nosotros', function () {
    return view('sobre_nosotros');
});