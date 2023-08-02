<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "siswa" => Siswa::with("prestasi", "nilai")->get()
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
     * @param  \App\Http\Requests\StoreSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiswaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(String $nisn)
    {
        return response()->json([
            "message" => "Berhasil get 1 siswa",
            "siswa" => Siswa::where("nisn", "=", $nisn)->with("prestasi", "nilai")->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    private function checkImageUploadAndReplaceIt($requestImage, $path, $imageFromDB)
    {
        if ($requestImage != null) {
            $photoName = time() . "_" . $requestImage->getClientOriginalName();
            $destinationPath = public_path("uploads/$path");
            $requestImage->move($destinationPath, $photoName);

            if ($imageFromDB != null) {
                $oldPhoto = public_path("uploads/$path/") . $imageFromDB;
                if (file_exists($oldPhoto)) @unlink($oldPhoto);
            }
        } else {
            $photoName = $imageFromDB;
            if ($photoName == null || $photoName == "") {
                return response()->json([
                    "error" => ["message" => "Harus mengupload semua foto"]
                ], 500);
            }
        }

        return $photoName;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $nisn)
    {
        try {
            $siswa = Siswa::where("nisn", "=", $nisn)->first();

            $siswa->nama = $request->nama;
            $siswa->alamat = $request->alamat;
            $siswa->email = $request->email;
            $siswa->asal_sekolah = $request->asal_sekolah;
            $siswa->jenis_kelamin = $request->jenis_kelamin;

            if ($request->is_update_foto) {
                $requestProfil = $request->file("foto_profil");
                $requestAkte = $request->file("foto_akte");
                $requestIjazah = $request->file("foto_ijazah");
                $requestKK = $request->file("foto_kk");
                $requestKtpOrtu = $request->file("foto_ktp_ortu");

                $photoAkteName = $this->checkImageUploadAndReplaceIt($requestAkte, "foto_akte", $siswa->foto_akte);
                $photoIjazahName = $this->checkImageUploadAndReplaceIt($requestIjazah, "foto_ijazah", $siswa->foto_ijazah);
                $photoKKName = $this->checkImageUploadAndReplaceIt($requestKK, "foto_kk", $siswa->foto_kk);
                $photoKtpOrtuName = $this->checkImageUploadAndReplaceIt($requestKtpOrtu, "foto_ktp_ortu", $siswa->foto_ktp_ortu);
                $photoProfilName = $this->checkImageUploadAndReplaceIt($requestProfil, "foto_profil", $siswa->foto_profil);

                $siswa->no_hp_ortu = $request->no_hp_ortu;
                $siswa->foto_profil = $photoProfilName;
                $siswa->foto_akte = $photoAkteName;
                $siswa->foto_ijazah = $photoIjazahName;
                $siswa->foto_kk = $photoKKName;
                $siswa->foto_ktp_ortu = $photoKtpOrtuName;
            }

            $siswa->save();

            return response()->json([
                "message" => "Data siswa berhasil diupload!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => ["message" => $e]
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
