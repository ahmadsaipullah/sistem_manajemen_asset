<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::Create( [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'level_id' => '1',
            'password' => Hash::make(123456789),

        ]);


    }
}
