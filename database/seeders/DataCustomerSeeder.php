<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_customers')->insert([
            [
                'image' => '',
                'nama' => 'Ridho',
                'alamat' => 'jl. kejapanan no2',
                'notelp' => '0821123321',
            ],
            [
                'image' => '',
                'nama' => 'Ridho',
                'alamat' => 'jl. gempol no2',
                'notelp' => '082134678',
            ],
            [
                'image' => '',
                'nama' => 'Ridho',
                'alamat' => 'jl. melian no2',
                'notelp' => '0821123665',
            ]
            ]);
    }
}
