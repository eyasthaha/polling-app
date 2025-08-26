<?php

namespace Database\Seeders;

use App\Models\PollOptions;
use App\Models\Polls;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Poll 1
        $poll1 = Polls::create([
            'title'       => 'What is your favorite programming language?',
            'description' => 'Choose one from the list below.',
        ]);

        $options1 = ['PHP', 'JavaScript', 'Python', 'Java'];
        foreach ($options1 as $opt) {
            PollOptions::create([
                'poll_id' => $poll1->id,
                'option'  => $opt,
            ]);
        }

        // Poll 2
        $poll2 = Polls::create([
            'title'       => 'Which frontend framework do you prefer?',
            'description' => 'Pick your go-to framework.',
        ]);

        $options2 = ['React', 'Vue.js', 'Angular', 'Svelte'];
        foreach ($options2 as $opt) {
            PollOptions::create([
                'poll_id' => $poll2->id,
                'option'  => $opt,
            ]);
        }
    }
}
