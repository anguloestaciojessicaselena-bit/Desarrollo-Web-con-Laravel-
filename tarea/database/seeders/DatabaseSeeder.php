<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario administrador fijo
        $this->call(\Database\Seeders\AdminSeeder::class);

        // Usuarios de ejemplo
        \App\Models\User::factory(5)->create();

        // Categorías y productos
        $this->call(\Database\Seeders\CategorySeeder::class);
        $this->call(\Database\Seeders\ProductSeeder::class);
    }
}
