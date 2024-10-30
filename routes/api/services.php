<?php

use App\Http\Controllers\Services\ServicesController;
use Illuminate\Support\Facades\Route;

Route::delete("/{id}", [ServicesController::class, 'delete']);
Route::patch("/{id}", [ServicesController::class, 'restore']);
Route::put("/{id}", [ServicesController::class, "update"]);
Route::get("/{id}", [ServicesController::class, "show"]);
Route::get("/", [ServicesController::class, "index"]);

Route::middleware(['jwt.auth'])->group(function () {
    Route::post("/", [ServicesController::class, 'store']);
});
