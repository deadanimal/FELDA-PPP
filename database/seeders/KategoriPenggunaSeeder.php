<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class KategoriPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_penggunas')->insert([
            [
                'nama' => 'Super Admin'
            ],
            [
                'nama' => 'Pengarah Jabatan'
            ],
            [
                'nama' => 'PEGAWAI HQ'
            ],
            [
                'nama' => 'Peserta'
            ],
            [
                'nama' => 'Pegawai Aduan'
            ],
            [
                'nama' => 'Pengurus Rancangan'
            ],
            [
                'nama' => 'Pegawai Wilayah'
            ],
            [
                'nama' => 'Penyelaras PPP Wilayah'
            ],
            [
                'nama' => 'Pegawai Tanah Wilayah'
            ],
            [
                'nama' => 'FIC Wilayah'
            ],
            [
                'nama' => 'Jawatankuasa Pelulus'
            ],
            [
                'nama' => 'MCC Agrobank'
            ],
            [
                'nama' => 'Pihak Agrobank'
            ],
            [
                'nama' => 'Pegawai Tanah Jabatan'
            ],  
            [
                'nama' => 'Pegawai Agrobank'
            ],  
            [
                'nama' => 'Pegawai Perjanjian'
            ],  
            [
                'nama' => 'Pegawai Perolehan HQ'
            ],   
            [
                'nama' => 'FIC HQ'
            ],  
            [
                'nama' => 'KPF'
            ],   
            [
                'nama' => 'Pegawai PPP Wilayah'
            ],   
            [
                'nama' => 'Peserta(Koop/Badan)'
            ],   
            [
                'nama' => 'Pegawai Tanah HQ'
            ],   
            [
                'nama' => 'Pegawai Undang Undang'
            ]                                                                         
        ]);
    }
}
