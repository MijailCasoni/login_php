<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\HomePage;


$controller_path = 'App\Http\Controllers';


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () use ($controller_path) {
    Route::get('/', [HomePage::class, 'index'])->name('pages-home');


});
