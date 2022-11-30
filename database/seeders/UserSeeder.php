<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'email' => 'saiful23@gmail.com',
                'idPengguna' => 'superAdmin',
                'nama' => 'Saiful',
                'nokadpengenalan' => '890420-11-1234',
                'password' => Hash::make('ppp@felda'),
                'kategoripengguna' => '1',
                'wilayah' => '12',
                'rancangan' => '330',
            ]                                                                            
        ]);
    }
}
