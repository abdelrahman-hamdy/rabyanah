<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Note: Brand images should be uploaded through the admin panel.
     * This seeder only creates the brand records with basic information.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => '4 Star',
                'description' => 'Premium 4 Star quality products',
                'active' => true,
            ],
            [
                'name' => '5 Star',
                'description' => 'Premium 5 Star quality products',
                'active' => true,
            ],
            [
                'name' => 'Al Oud',
                'description' => 'Authentic Al Oud fragrance products',
                'active' => true,
            ],
            [
                'name' => 'Hamz',
                'description' => 'Hamz premium brand products',
                'active' => true,
            ],
            [
                'name' => 'Hamz 2',
                'description' => 'Hamz 2 premium brand products',
                'active' => true,
            ],
            [
                'name' => 'Hamz 2 Star',
                'description' => 'Hamz 2 Star premium brand products',
                'active' => true,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['name' => $brand['name']],
                $brand
            );
        }
    }
}
