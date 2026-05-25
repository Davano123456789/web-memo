<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterController;

Route::post('/generate-pdf', [LetterController::class, 'generatePdf']);
