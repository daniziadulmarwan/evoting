<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidate;
use App\Models\Position;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'fullname' => 'Hasan Zavair Marwan',
            'username' => '2233445566',
            'password' => bcrypt('password'),
            'password_text' => 'password',
            'status' => 'admin'
        ]);

        Setting::create([
            'title' => 'Pemilihan calon formatur PCM Cimanggu',
            'max_vote' => 1,
        ]);

        Position::create([
            'description' => 'Formatur'
        ]);

        Candidate::factory(15)->create();
    }
}
