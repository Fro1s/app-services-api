<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post("/", [UserController::class, 'store']);
Route::delete("/{id}", [UserController::class, 'delete']);
Route::patch("/{id}", [UserController::class, 'restore']);
Route::put("/{id}", [UserController::class, "update"]);
Route::get("/{id}", [UserController::class, "show"]);
Route::get("/", [UserController::class, "index"]);

Route::middleware(['jwt.auth'])->group(function (){

});