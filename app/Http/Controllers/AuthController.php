<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Siswa;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function registersiswa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nisn" => "required",
            "nama" => "required|string",
            "jenis_kelamin" => "required|max:1",
            "no_hp_ortu" => "required",
            "asal_sekolah" => "required",
            "alamat" => "required|string",
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => ["message" => $validator->errors()->all()[0]]]);
        }


        try {
            $siswa = Siswa::where("nisn", "=", $request->nisn)
                ->orWhere("email", "=", $request->email)
                ->first();
            if ($siswa != null) {
                return response()->json([
                    "error" => ["message" => "Siswa sudah terdaftar"]
                ]);
            }

            $newSiswa = Siswa::create([
                "nisn" => $request->nisn,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "nama" => $request->nama,
                "asal_sekolah" => $request->asal_sekolah,
                "alamat" => $request->alamat,
                "jenis_kelamin" => $request->jenis_kelamin,
                "no_hp_ortu" => $request->no_hp_ortu,
            ]);


            if ($newSiswa != null) {
                return response()->json([
                    "message" => "Siswa baru berhasil ditambahkan",
                    "siswa" => $newSiswa,
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([
                "error" => ["message" => $e]
            ], 500);
        }
    }

    public function loginSiswa(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "nisn" => "required",
            "password" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json(["error" => ["message" => $validator->errors()->all()]]);
        }

        $siswa = Siswa::where("nisn", "=", $request->nisn)->first();

        if (!$siswa) {
            return response()->json([
                "error" => ["message" => "User not found"]
            ]);
        }
        if ($siswa && !(Hash::check($request->password, $siswa->password))) {
            return response()->json([
                "error" => ["message" => "Invalid password"]
            ]);
        }
        if (!($siswa && Hash::check($request->password, $siswa->password))) {
            return response()->json([
                "error" => ["message" => "Unauthenticated"]
            ], 401);
        }

        // Auth::guard('siswa')->attempt(["nisn" => $request->nisn, "password" => $request->password]);
        $token = $siswa->createToken("auth_token", ["siswa"])->plainTextToken;

        return response()->json([
            "token" => $token,
            "token_type" => "Bearer",
            "siswa" => $siswa,
        ], 200);
    }

    public function logoutSiswa(Request $request)
    {
        $siswa = Siswa::where("nisn", "=", $request->nisn)->first();
        try {
            $siswa->tokens()->delete();
            return response()->json([
                "message" => "Logout berhasil"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => [
                    "message" => "Logout gagal",
                    "exception" => $e,
                ]
            ]);
        }
    }

    public function registerAdmin(Request $request)
    {
        try {
            $admin = Admin::create([
                "id" => Str::uuid()->toString(),
                "username" => $request->username,
                "password" => Hash::make($request->password),
            ]);
            return response()->json([
                "message" => "Admin berhasil ditambahkan",
                "data" => $admin,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Admin gagal ditambahkan",
            ], 500);
        }
    }

    public function loginAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "username" => "required|string",
            "password" => "required|string"
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => ["message" => $validator->errors()->all()]]);
        }

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin) {
            return response()->json(["error" => ["message" => "User Not Found"]], 200);
        }
        if ($admin && !(Hash::check($request->password, $admin->password))) {
            return response()->json(["error" => ["message" => "Invalid Password"]], 200);
        }
        if (!($admin && Hash::check($request->password, $admin->password))) {
            return response()->json(["error" => ["message" => "Unauthenticated"]], 401);
        }

        $token = $admin->createToken("auth_token", ["admin"])->plainTextToken;

        return response()->json([
            "admin" => $admin,
            "token" => $token,
            "token_type" => "Bearer"
        ], 200);
    }

    public function logoutAdmin(Request $request)
    {
        $admin = Admin::where("username", $request->username)->first();
        try {
            $admin->tokens()->delete();
            return response()->json(["message" => "Logout Berhasil"]);
        } catch (Exception $e) {
            return response()->json(["message" => "Logout Gagal"], 401);
        }
    }
}
