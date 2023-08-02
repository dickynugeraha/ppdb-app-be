<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Http\Requests\StoreParameterRequest;
use App\Http\Requests\UpdateParameterRequest;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "data" => Parameter::all()
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        return response()->json([
            "data" => Parameter::with("sub_bobot")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParameterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParameterRequest $request)
    {
        try {
            $newParameter = Parameter::create([
                "nama" => $request->nama,
                "sifat" => $request->sifat,
            ]);
            return response()->json([
                "parameter_id" => $newParameter->id,
                "message" => "Data kriteria berhasil ditambahkan",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Data kriteria gagal ditambahkan",
                "error" => $e->getMessage(),
            ], 401);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_with_sub_bobot(String $id)
    {
        $sub_bobot = Parameter::select("id", "nama", "sifat", "created_at", "updated_at")
            ->where("id", $id)
            ->with("sub_bobot")
            ->get();
        try {
            return response()->json([
                "message" => "Data sub bobot berhasil ditampilkan",
                "data" => $sub_bobot
            ]);
        } catch (\Exception $err) {
            return response()->json([
                "message" => "Data sub bobot gagal ditampilkan",
                "error" => $err->getMessage()
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Parameter $parameter)
    {
        return response()->json([
            "data" => $parameter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParameterRequest  $request
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParameterRequest $request, Parameter $parameter)
    {
        try {
            $parameter->update([
                "nama" => $request->nama,
                "sifat" => $request->sifat,
            ]);
            return response()->json([
                "data" => $parameter,
                "message" => "Kriteria berhasil diubah"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Kriteria gagal diubah",
                "error" => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter $parameter)
    {
        try {
            $parameter->delete();
            return response()->json([
                "message" => "Kriteria berhasil dihapus",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Kriteria gagal dihapus",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
