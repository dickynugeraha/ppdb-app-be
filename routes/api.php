<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\SekolahController;
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
    Route::get("sekolah", [SekolahController::class, "index"]);


    Route::group(["middleware" => ["auth:sanctum"]], function () {
        // route admin
        Route::get("parameter/all", [ParameterController::class, "index2"]);
        Route::apiResource("parameter", ParameterController::class);
        Route::apiResource("bobot", BobotController::class);
        Route::apiResource("sub-bobot", SubBobotController::class);
        Route::get("parameter/{id}/sub-bobot", [ParameterController::class, "show_with_sub_bobot"]);
        Route::post("admin/logout", [AuthController::class, "logoutAdmin"]);
        // route siswa
        Route::get("siswa/", [SiswaController::class, "index"]);
        Route::post("siswa/{nisn}/update", [SiswaController::class, "update"]);
        Route::get("siswa/{nisn}", [SiswaController::class, "show"]);
        Route::post("siswa/logout", [AuthController::class, "logoutSiswa"]);
        Route::post("sekolah/update", [SekolahController::class, "update"]);
        Route::post("prestasi/{nisn}/update", [PrestasiController::class, "update"]);
        Route::get("nilai", [NilaiController::class, "index"]);
        Route::post("nilai", [NilaiController::class, "store"]);
        Route::get("nilai/{nisn}", [NilaiController::class, "show"]);
        Route::get("ranking/export", [NilaiController::class, "createPdfRangking"]);
    });
});
