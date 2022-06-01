<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'H&M',
        ]);
        Brand::create([
            'name' => 'ZARA',
        ]);
        Brand::create([
            'name' => 'Victor',
        ]);
        Brand::create([
            'name' => 'Giordano',
        ]);
        Brand::create([
            'name' => 'Channel',
        ]);
        Brand::create([
            'name' => 'Nike',
        ]);
    }
}
