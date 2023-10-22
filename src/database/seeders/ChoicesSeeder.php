<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\choices::create([
            'questions_id' => 4,
            'text' => 'ピカチュウ',
            'is_correct' => 1,
        ]);
    }
}
