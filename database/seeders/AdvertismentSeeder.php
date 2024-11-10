<?php

namespace Database\Seeders;

use App\Models\Advertisment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertismentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertisment::factory(10)->create();
    }
}
