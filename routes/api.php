<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubBobotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Cors;

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

Route::group(["middleware" => ["cors"]], function(){
    Route::post('admin/login', [AuthController::class, 'loginAdmin']);

    Route::group(["middleware" => ["auth:sanctum"]], function(){
        Route::apiResource("parameter", ParameterController::class);
        Route::apiResource("bobot", BobotController::class); 
        Route::apiResource("sub-bobot", SubBobotController::class);
        Route::get("parameter/{id}/sub-bobot", [ParameterController::class, "show_with_sub_bobot"]);
        Route::get("sub-bobot/{id}/parameter", [SubBobotController::class, "show_by_kategori"]);
        Route::post("admin/logout", [AuthController::class, "logoutAdmin"]);
    });
    Route::apiResource("admin", AdminController::class);
});



