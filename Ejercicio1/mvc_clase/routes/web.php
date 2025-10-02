<?php

use app\controllers\CreditoController;
use app\controllers\InicioController;


use lib\Route;

// Home
Route::get("/test",  [InicioController::class,"index"]);

//CREDITO 
//Route::get("/home", [CreditoController::class,"index"]);
//Route::post("/home", [CreditoController::class,"index"]);
// Ejecutar el router
Route::dispatch();
