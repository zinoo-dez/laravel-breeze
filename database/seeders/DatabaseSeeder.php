<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678')
        ]);

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            StoreSeeder::class,
            ProductSeeder::class,
            SupplierSeeder::class,
            FaqCategorySeeder::class,
            AdvertismentSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
