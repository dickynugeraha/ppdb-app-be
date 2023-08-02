<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = Sekolah::all()[0];

        return response()->json([
            "sekolah" => $sekolah
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
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

    private function imageUploadAndReplaceFotoIdentitasSekolah($requestIdentitas1, $requestIdentitas2, $requestIdentitas3, $imageFromDB)
    {
        $fotoIdentitas = explode("|", $imageFromDB);

        if ($imageFromDB != null) {
            $fotoOld1 = public_path("uploads/foto_identitas_sekolah/") . $fotoIdentitas[0];
            $fotoOld2 = public_path("uploads/foto_identitas_sekolah/") . $fotoIdentitas[1];
            $fotoOld3 = public_path("uploads/foto_identitas_sekolah/") . $fotoIdentitas[2];
            if (file_exists($fotoOld1)) @unlink($fotoOld1);
            if (file_exists($fotoOld2)) @unlink($fotoOld2);
            if (file_exists($fotoOld3)) @unlink($fotoOld3);
        }

        if ($requestIdentitas1 != null && $requestIdentitas2 != null && $requestIdentitas3 != null) {
            $imageName1 = time() . "_" . $requestIdentitas1->getClientOriginalName();
            $pathUpload = public_path("uploads/foto_identitas_sekolah");
            $requestIdentitas1->move($pathUpload, $imageName1);

            $imageName2 = time() . "_" . $requestIdentitas2->getClientOriginalName();
            $requestIdentitas2->move($pathUpload, $imageName2);

            $imageName3 = time() . "_" . $requestIdentitas3->getClientOriginalName();
            $requestIdentitas3->move($pathUpload, $imageName3);
        } else {
            return response()->json([
                "error" => ["message" => "Foto harus di upload semua"]
            ]);
        }

        return $imageName1 . "|" . $imageName2 . "|" . $imageName3;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        try {
            $sekolah = Sekolah::find($id)->first();

            $sekolah->nama = $request->nama;
            $sekolah->deskripsi = $request->deskripsi;
            if ($request->is_update_foto == "1") {
                $fotoLogo = $request->file("foto_logo");
                $fotoAlurPendaftaran = $request->file("foto_alur_pendaftaran");
                $fotoIdentitas1 = $request->file("foto_identitas_1");
                $fotoIdentitas2 = $request->file("foto_identitas_2");
                $fotoIdentitas3 = $request->file("foto_identitas_3");

                $fotoLogoName = $this->checkImageUploadAndReplaceIt($fotoLogo, "foto_logo", $sekolah->foto_logo);
                $fotoAlurPendaftaranName = $this->checkImageUploadAndReplaceIt($fotoAlurPendaftaran, "foto_alur_pendaftaran", $sekolah->foto_alur_pendaftaran);
                $fotoIdentitasSekolah = $this->imageUploadAndReplaceFotoIdentitasSekolah($fotoIdentitas1, $fotoIdentitas2, $fotoIdentitas3, $sekolah->foto_identitas);

                $sekolah->foto_logo = $fotoLogoName;
                $sekolah->foto_alur_pendaftaran = $fotoAlurPendaftaranName;
                $sekolah->foto_identitas =  $fotoIdentitasSekolah;
            }
            $sekolah->pendaftaran_buka = Carbon::parse($request->pendaftaran_buka)->toDateTimeString();
            $sekolah->pendaftaran_tutup = Carbon::parse($request->pendaftaran_tutup)->toDateTimeString();;
            $sekolah->pengumuman_seleksi = Carbon::parse($request->pengumuman_seleksi)->toDateTimeString();;

            $sekolah->save();

            return response()->json([
                "message" => "Data sekolah berhasil diubah",
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
     * @param  \App\Models\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        //
    }
}
