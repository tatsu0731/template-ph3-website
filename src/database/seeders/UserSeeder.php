<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name'=> '増田 俊樹',
            'email'=> 'masuda.0130@gmail.com',
            'password'=> 'tanuki',
        ]);
    }
}
