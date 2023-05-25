<?php

use App\Http\Controllers\SuscriberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('suscriber', [SuscriberController::class, 'all'])
->name('suscribers.all');