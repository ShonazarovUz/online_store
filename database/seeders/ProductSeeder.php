<?php

namespace Database\Seeders;

use App\Models\Product; // Agar siz Product modelidan foydalanayotgan bo‘lsangiz
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(10)->create();
    }
}
