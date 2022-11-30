<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WilayahSeeder::class);
        $this->call(KategoriPenggunaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
