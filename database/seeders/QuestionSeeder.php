<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Question::firstOrCreate([
            'question' => 'When are the Opening and Closing Times?',
            'answer' => 'We are open on Mondays through Saturdays from 8:30 AM to 12 PM, 2 PM to 8 PM',
            'extra_answer' => 'And on Sundays from 2 PM to 8 PM'
        ]);

        Question::firstOrCreate([
            'question' => 'Is it affordable?',
            'answer' => 'Absolutely, from student plans to muscle maniac plans, we have plans for every budget.',
        ]);
    }
}