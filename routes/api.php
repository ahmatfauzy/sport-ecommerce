<?php

use App\Http\Controllers\Api\MidtransController;
use Illuminate\Support\Facades\Route;

Route::post('/midtrans/create', [MidtransController::class, 'createTransaction']);
Route::post('/midtrans/notification', [MidtransController::class, 'notificationHandler']);