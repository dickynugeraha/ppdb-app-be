<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    private function checkFileAndUpload($requestFile, $path, $fileFromDB)
    {
        if ($requestFile != null) {
            $fileName = uniqid() . "_" . $requestFile->getClientOriginalName();
            $destinationPath = public_path("uploads/file_prestasi/$path");
            $requestFile->move($destinationPath, $fileName);

            if ($fileFromDB != null || $fileFromDB != "") {
                $oldFile = public_path("uploads/file_prestasi/$path/") . $fileFromDB;
                if (file_exists($oldFile)) @unlink($oldFile);
            }
        }

        return $fileName;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request, String $nisn)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestasi $prestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $nisn)
    {
        $siswa = Prestasi::where("nisn", "=", $nisn)->first();

        $nilaiSemester = $request->file("nilai_semester");
        $nilaiUn = $request->file("nilai_un");
        $nilaiUas = $request->file("nilai_uas");
        $prestasiAkademik = $request->file("prestasi_akademik");
        $prestasiNonAkademik = $request->file("prestasi_non_akademik");

        if ($nilaiSemester == null || $nilaiUas == null || $nilaiUn == null || $prestasiAkademik == null || $prestasiNonAkademik == null) {
            return response()->json([
                "error" => ["message" => "Semua field harus di upload"]
            ], 400,);
        }


        $fileNilaiSemesterName =  $this->checkFileAndUpload($nilaiSemester, "nilai_semester", $siswa->nilai_semester ?? "");
        $fileNilaiUnName = $this->checkFileAndUpload($nilaiUn, "nilai_un", $siswa->nilai_un ?? "");
        $fileNilaiUasName = $this->checkFileAndUpload($nilaiUas, "nilai_uas", $siswa->nilai_uas ?? "");
        $filePrestasiAkademikName = $this->checkFileAndUpload($prestasiAkademik, "prestasi_akademik", $siswa->prestasi_akademik ?? "");
        $filePrestasiNonAkademikName = $this->checkFileAndUpload($prestasiNonAkademik, "prestasi_non_akademik", $siswa->prestasi_non_akademik ?? "");


        // $fileNilaiSemesterName =  $this->checkFileAndUpload($nilaiSemester, "nilai_semester");
        // $fileNilaiUnName = $this->checkFileAndUpload($nilaiUn, "nilai_un");
        // $fileNilaiUasName = $this->checkFileAndUpload($nilaiUas, "nilai_uas");
        // $filePrestasiAkademikName = $this->checkFileAndUpload($prestasiAkademik, "prestasi_akademik");
        // $filePrestasiNonAkademikName = $this->checkFileAndUpload($prestasiNonAkademik, "prestasi_non_akademik");



        if ($siswa == null) {
            // add
            Prestasi::create([
                "nisn" => $nisn,
                "nilai_semester" => $fileNilaiSemesterName,
                "nilai_un" => $fileNilaiUnName,
                "nilai_uas" => $fileNilaiUasName,
                "prestasi_akademik" => $filePrestasiAkademikName,
                "prestasi_non_akademik" => $filePrestasiNonAkademikName,
            ]);
            return response()->json([
                "message" => "Data prestasi berhasil di tambah"
            ]);
        }

        if ($siswa != null) {
            // update
            $siswa->nilai_semester = $fileNilaiSemesterName;
            $siswa->nilai_un = $fileNilaiUnName;
            $siswa->nilai_uas = $fileNilaiUasName;
            $siswa->prestasi_akademik = $filePrestasiAkademikName;
            $siswa->prestasi_non_akademik = $filePrestasiNonAkademikName;
            $siswa->save();
            return response()->json([
                "message" => "Data prestasi berhasil di ubah"
            ]);
        }

        return response()->json([
            "error" => ["message" => "somethinmg wrong"]
        ], 500,);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        //
    }
}
