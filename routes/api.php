<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SubBobotController;
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

Route::group(["middleware" => ["cors"]], function () {
    Route::post('admin/login', [AuthController::class, 'loginAdmin']);
    Route::post("siswa/login", [AuthController::class, "loginSiswa"]);
    Route::post("siswa/register", [AuthController::class, "registerSiswa"]);

    Route::group(["middleware" => ["auth:siswa"]], function () {
        // manipulate data siswa
    });

    Route::group(["middleware" => ["auth:sanctum"]], function () {
        // route admin
        Route::apiResource("parameter", ParameterController::class);
        Route::apiResource("bobot", BobotController::class);
        Route::apiResource("sub-bobot", SubBobotController::class);
        Route::get("parameter/{id}/sub-bobot", [ParameterController::class, "show_with_sub_bobot"]);
        Route::post("admin/logout", [AuthController::class, "logoutAdmin"]);
        // route siswa
        Route::apiResource("siswa", SiswaController::class);
        Route::post("siswa/logout", [AuthController::class, "logoutSiswa"]);
    });
    Route::apiResource("admin", AdminController::class);
});
