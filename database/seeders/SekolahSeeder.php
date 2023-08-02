<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sekolahs")->insert([
            "id" => Str::uuid(),
            "nama" => "sman dummy",
            "deskripsi" => "deskripsi dummy",
            "foto_logo" => "logo.jpg",
            "foto_identitas" => "sekolah1.jpg|sekolah2.jpeg|sekolah3.jpg",
            "foto_alur_pendaftaran" => "pendaftaran.jpg",
            "pendaftaran_buka" => "2023-07-01 23:59:59",
            "pendaftaran_tutup" => "2023-07-01 23:59:59",
            "pengumuman_seleksi" => "2023-07-01 23:59:59",
        ]);
    }
}
