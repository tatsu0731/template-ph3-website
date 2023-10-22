<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\questions::create([
            'text' => 'サトシの相棒といえば',
            'image' => '04.png',
            'quiz_id' => 3,
        ]);
    }
}
