<?php

namespace Database\Seeders;

//use App\Models\DataKategori;
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
        $this->call([
            DataCustomerSeeder::class,
            UserSeeder::class,            
            //DataKategoriSeeder::class,
            DataSparepartSeeder::class,
            
        ]);

    }
}
