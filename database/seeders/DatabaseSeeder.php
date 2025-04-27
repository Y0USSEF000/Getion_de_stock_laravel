<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // ✅ Ajouté
use Illuminate\Support\Facades\Hash; // ✅ Ajouté

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
