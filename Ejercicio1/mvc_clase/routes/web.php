<?php

use app\controllers\CreditoController;

use lib\Route;

// Home
Route::get("/Home", [CreditoController::class,"index"]);

// Ejecutar el router
Route::dispatch();
