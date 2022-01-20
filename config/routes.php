<?php

use Illuminate\Support\Facades\Route;
use MartinsHumberto\PagarmeGateway\Controllers\PagarmeNotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::apiResource('pagar-me/notifications', PagarmeNotificationController::class);
