<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            [
                'name' => 'Nasi Goreng',
                'price' => 35000,
                'stock' => 50,
                'description' => 'Nasi goreng dengan bumbu spesial dan telur',
            ],
            [
                'name' => 'Mie Goreng',
                'price' => 30000,
                'stock' => 40,
                'description' => 'Mie goreng dengan sayuran segar dan daging ayam',
            ],
            [
                'name' => 'Soto Ayam',
                'price' => 25000,
                'stock' => 30,
                'description' => 'Soto ayam tradisional dengan kuah kuning yang lezat',
            ],
            [
                'name' => 'Gado-gado',
                'price' => 20000,
                'stock' => 25,
                'description' => 'Campuran sayuran dengan saus kacang yang gurih',
            ],
            [
                'name' => 'Lumpia',
                'price' => 15000,
                'stock' => 60,
                'description' => 'Lumpia goreng isi daging cincang dan rebung',
            ],
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
