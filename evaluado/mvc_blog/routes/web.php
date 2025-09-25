<?php
use lib\Route;
use app\controllers\HomeController;
use app\controllers\PerfilController;
use app\controllers\LenguajeController;
use app\controllers\ContactoController;

Route::get("/", [HomeController::class,"index"]);
Route::get("/inicio", [PerfilController::class,"index"]);
Route::get("/lenguaje", [LenguajeController::class,"index"]);
Route::get("/contacto", [ContactoController::class,"index"]);
Route::post("/contacto/validar", [ContactoController::class,"validar"]);

Route::dispatch();