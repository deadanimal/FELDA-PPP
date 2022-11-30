<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Wilayah')->insert([
            [
                'nama' => 'Alor Setar'
            ],
            [
                'nama' => 'Gua Musang'
            ],
            [
                'nama' => 'Jengka'
            ],
            [
                'nama' => 'Johor Bahru'
            ],
            [
                'nama' => 'Kuantan'
            ],
            [
                'nama' => 'Mempaga'
            ],
            [
                'nama' => 'Raja Alias'
            ],
            [
                'nama' => 'Sahabat'
            ],
            [
                'nama' => 'Segamat'
            ],
            [
                'nama' => 'Terengganu'
            ],
            [
                'nama' => 'Trolak'
            ], 
            [
                'nama' => 'HQ'
            ],                                                                                
        ]);
    }
}
