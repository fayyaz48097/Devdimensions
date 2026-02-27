<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the admins table with the default super-admin account.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@devdimensions.com'],
            [
                'name'     => 'Super Admin',
                'email'    => 'admin@devdimensions.com',
                'password' => Hash::make('password'),
            ]
        );

        $this->command->info('Admin seeded successfully → admin@devdimensions.com');
    }
}
