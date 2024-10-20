<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\Suppliers;
use Database\Factories\SupplierFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::factory(10)->create();
    }
}
