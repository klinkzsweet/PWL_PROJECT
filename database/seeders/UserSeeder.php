<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'foto' => '',
                'nama' => 'Afvanie Rama Ardyansah',
                'email' => 'ardyansah201@gmail.com',
                'password' => Hash::make('1234'),
                'level' => 'Admin',
                'tanggal_join' => '2022-05-01',
            ],
            [
                'foto' => '',
                'nama' => 'Ridho Triadilaksono',
                'email' => 'ridhotriadi@gmail.com',
                'password' => Hash::make('1234'),
                'level' => 'Admin',
                'tanggal_join' => '2021-06-04',
            ],
            [
                'foto' => '',
                'nama' => 'jumain',
                'email' => 'jumain@gmail.com',
                'password' => Hash::make('1234'),
                'level' => 'Admin',
                'tanggal_join' => '2022-06-04',
            ]
            ]);
    }
}
