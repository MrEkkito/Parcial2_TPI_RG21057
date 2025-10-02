<?php

use app\controllers\CreditoController;



use lib\Route;

// Home
Route::get("/home", [CreditoController::class,"index"]);

// Ejecutar el router
Route::dispatch();
