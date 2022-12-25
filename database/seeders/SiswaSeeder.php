<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            'nama'=>'nina',
            'nomor_induk'=>'1000',
            'alamat'=>'jln.example',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'adrian',
            'nomor_induk'=>'1001',
            'alamat'=>'jln.example1',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama'=>'saskia',
            'nomor_induk'=>'1002',
            'alamat'=>'jln.example2',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
