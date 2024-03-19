<?php

namespace Database\Seeders;

use App\Enums\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Test User 1',
                'email' => 'testUser1@example.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 2,
                'name' => 'Test User 2',
                'email' => 'testUser2@example.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'id' => 3,
                'name' => 'Test Admin User',
                'email' => 'testAdmin@example.com',
                'password' => Hash::make('12345678'),
            ]
        ]);

        DB::table('reviews')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'message' => 'Test user message 1',
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'message' => 'Test user message 2',
            ]
        ]);

        DB::table('answers')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'review_id'=> 1,
                'message' => 'Test admin message 1',
            ],
        ]);

        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => Role::Admin->value,
            ],
        ]);

        DB::table('user_roles')->insert([
            [
                'user_id' => 3,
                'role_id'=> 1,
            ],
        ]);
    }
}
