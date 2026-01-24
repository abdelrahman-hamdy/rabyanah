<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        if (! User::where('email', 'admin@rabyanah.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@rabyanah.com',
            ]);
        }

        // Run seeders
        $this->call([
            SiteSettingsSeeder::class,
            BrandSeeder::class,
            DemoDataSeeder::class,
        ]);
    }
}
