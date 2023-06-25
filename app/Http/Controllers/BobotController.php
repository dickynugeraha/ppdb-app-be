<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Parameter;
use App\Http\Requests\StoreBobotRequest;
use App\Http\Requests\UpdateBobotRequest;
use Illuminate\Support\Str;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobot = Bobot::with('parameter')->get();

        return response()->json([
            "data" => $bobot,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBobotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBobotRequest $request)
    {
        // $newId = Str::uuid()->toString();
        try {
            $bobot = Bobot::create([
                // "id" => $newId,
                "parameter_id" => $request->parameter_id,
                "bobot" => $request->bobot
            ]);

            return response()->json([
                "bobot_id" => $bobot->id,
                "message" => "Data bobot berhasil ditambahkan",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Data bobot gagal ditambahkan",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBobotRequest  $request
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBobotRequest $request, Bobot $bobot)
    {
        try {
            $bobot->update([
                "bobot" => $request->bobot,
            ]);
            return response()->json([
                "message" => "Bobot berhasil diubah",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Bobot gagal diubah",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bobot $bobot)
    {
        $bobot->delete();

        return response()->json([
            "message" => "Data bobot berhasil dihapus"
        ]);
    }
}
