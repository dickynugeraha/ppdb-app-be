<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Http\Requests\StoreNilaiRequest;
use App\Http\Requests\UpdateNilaiRequest;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select(DB::raw('SELECT * FROM rankings ORDER BY ranking DESC'));

        return response()->json([
            "data" => $data
        ]);
    }

    public function createPdfRangking()
    {
        $data = DB::select(DB::raw('SELECT * FROM rankings ORDER BY ranking DESC'));

        $pdf = Pdf::loadView("nilai.ranking", compact("data"));

        return $pdf->download("ranking_seleksi.pdf");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNilaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNilaiRequest $request)
    {
        $nilai = $request->nilai;

        try {
            $count = 0;
            foreach ($nilai as $nl) {
                $input["nisn"] = $request->nisn;
                $input["parameter_id"] = $nl["kategoriId$count"];
                $input["nama_parameter"] = $nl["kategoriNama$count"];
                $input["nilai"] = $nl["nilai$count"];

                $count++;

                Nilai::create($input);
            }

            return response()->json([
                "message" => "Data nilai berhasil di tambah"
            ]);
        } catch (\Exception $e) {
            response()->json([
                "error" => ["message" => $e]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show($nisn)
    {
        try {
            $nilai = Nilai::where("nisn", "=", $nisn)->with("parameter")->get();

            return response()->json([
                "nilai" => $nilai
            ]);
        } catch (\Exception $e) {
            response()->json([
                "error" => ["message" => $e]
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiRequest  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNilaiRequest $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
