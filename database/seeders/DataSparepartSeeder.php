<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_spareparts')->insert([
            [
                'image' => '',
                'nama' => 'LCD',
                'harga' => 'Rp.100000',


            ],
            [
                'image' => '',
                'nama' => 'Auto Radio',
                'harga' => 'Rp.150000',
            ],
            [
                'image' => '',
                'nama' => 'Gear Box',
                'harga' => 'Rp.80000'
            ],
            ]);
    }
}
