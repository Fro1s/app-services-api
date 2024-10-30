<?php

use App\Http\Controllers\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::post("/", [CategoryController::class, 'store']);
Route::delete("/{id}", [CategoryController::class, 'delete']);
Route::patch("/{id}", [CategoryController::class, 'restore']);
Route::put("/{id}", [CategoryController::class, "update"]);
Route::get("/{id}", [CategoryController::class, "show"]);
Route::get("/", [CategoryController::class, "index"]);

Route::middleware(['jwt.auth'])->group(function (){

});