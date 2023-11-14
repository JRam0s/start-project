<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = [
            ["nome" => "NIKE", "logo" => "nike.png"],
            ["nome" => "ADIDAS", "logo" => "adidas.png"],
            ["nome" => "REEBOK", "logo" => "reebok.png"],
            
        ];
        DB::table('marcas')->insert($data);

        
    }
}
