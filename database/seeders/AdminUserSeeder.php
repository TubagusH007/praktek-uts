<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat akun Admin
        User::updateOrCreate(
            ['email' => 'admin@goblog.com'],
            [
                'name'     => 'Administrator',
                'email'    => 'admin@goblog.com',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        $this->command->info('✅ Admin seeded: admin@goblog.com / admin123');
    }
}
