<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'test@test.com')->exists()) {
            User::factory()
                ->withEmail('test@test.com')
                ->create();
        }
        User::factory(5)->create();
    }
}
