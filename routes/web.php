<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LetterController;

Route::get('/', [LetterController::class, 'index'])->name('home');
Route::post('/generate-pdf', [LetterController::class, 'generatePdf'])->name('generate.pdf');

