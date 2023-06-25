<?php

namespace App\Http\Controllers;

use App\Models\SubBobot;
use App\Http\Requests\StoreSubBobotRequest;
use App\Http\Requests\UpdateSubBobotRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SubBobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subBobot = SubBobot::with("parameter")->get();

        return response()->json([
            "data" => $subBobot
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubBobot  $subBobot
     * @return \Illuminate\Http\Response
     */
    // public function show_by_kategori(String $subBobotId)
    // {
    //     $sub_bobot = SubBobot::where("parameter_id", $subBobotId)->with("paramater")->get();

    //     return response()->json([
    //         "data" => $sub_bobot
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubBobotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubBobotRequest $request)
    {
        // $subBobotId = Str::uuid()->toString();
        try {
            $bobot = SubBobot::create([
                "parameter_id" => $request->parameter_id,
                "keterangan" => $request->keterangan,
                "bobot" => $request->bobot,
            ]);
            return response()->json([
                "sub_bobot_id" => $bobot->id,
                "message" => "Data sub bobot berhasil ditambahkan"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Data Sub bobot gagal ditambahkan",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubBobotRequest  $request
     * @param  \App\Models\SubBobot  $subBobot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubBobotRequest $request, SubBobot $subBobot)
    {
        try {
            $subBobot->update([
                "bobot" => $request->bobot,
                "keterangan" => $request->keterangan,
            ]);
            return response()->json([
                "message" => "Data Sub bobot berhasil diubah"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Data Sub bobot gagal diubah",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubBobot  $subBobot
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubBobot $subBobot)
    {
        $subBobot->delete();
        return response()->json([
            "message" => "Data Sub bobot berhasil dihapus"
        ]);
    }
}
