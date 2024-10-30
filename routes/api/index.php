<?php

use App\Builder\ReturnApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/auth')->group(base_path('routes/api/auth.php'));
Route::prefix('/user')->group(base_path('routes/api/user.php'));
Route::prefix('/category')->group(base_path('routes/api/category.php'));
Route::prefix('/services')->group(base_path('routes/api/services.php'));

Route::get('/', function () {
    return ReturnApi::success('Running');
});
