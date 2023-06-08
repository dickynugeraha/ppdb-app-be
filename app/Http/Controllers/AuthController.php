<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function registerAdmin(Request $request){
        try {
            $admin = Admin::create([
                "id" => Str::uuid()->toString(),
                "username" => $request->username,
                "password" => Hash::make( $request->password),
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

    public function loginAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            "username" => "required|string",
            "password" => "required|string"
        ]);

        if ($validator->fails()){
            return response()->json(["error" => $validator->errors()->all()]);
        }

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin){
            return response()->json(["error" => ["message" => "User Not Found"]], 401);
        } 
        if ($admin && !(Hash::check($request->password, $admin->password))){
            return response()->json(["error" => ["message" => "Invalid Password"]], 401);
        } 
        if (!($admin && Hash::check($request->password, $admin->password))){
            return response()->json(["error" => ["message" => "Unauthenticated"]], 401);
        }

        $token = $admin->createToken("token_admin")->plainTextToken;

        return response()->json([
            "admin" => $admin,
            "token" => $token, 
            "token_type" => "Bearer"
        ], 200);
    }

    public function logoutAdmin(Request $request){
        $admin = Admin::where("username", $request->username)->first();
        try{
            $admin->tokens()->delete();
            return response()->json(["message" => "Logout Berhasil"]);
        }catch(Exception $e){
            return response()->json(["message" => "Logout Gagal"], 401);
        }
    }
}
