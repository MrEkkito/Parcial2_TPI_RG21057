<?php

use app\controllers\HomeController;
use app\controllers\DatosController;
use lib\Route;

// Home
Route::get("/Home", [HomeController::class,"index"]);

// CRUD estudiantes
Route::get("/Datos", [DatosController::class,"index"]);
Route::post("/Datos", [DatosController::class,"index"]); // <-- permitir POST
// Eliminar estudiante
Route::get("/Datos/delete/:id", [DatosController::class, "delete"]);


// Ejecutar el router
Route::dispatch();
