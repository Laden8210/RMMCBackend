<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Question;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::create([
        //     'username' => 'admin',
        //     'email' => 'admin@rmmc.com',
        //     'password' => Hash::make('adminpassword'),
        //     'user_type' => 'admin',
        // ]);

                // Multiple Choice Question 1
                $question1 = Question::create([
                    'question' => 'What is the capital of France?',
                    'correct_answer' => 'Paris',
                    'type' => 'multiple_choice',
                ]);
                $question1->options()->createMany([
                    ['option' => 'Berlin'],
                    ['option' => 'Madrid'],
                    ['option' => 'Paris'],
                    ['option' => 'Rome'],
                ]);

                // Multiple Choice Question 2
                $question2 = Question::create([
                    'question' => 'Which planet is known as the Red Planet?',
                    'correct_answer' => 'Mars',
                    'type' => 'multiple_choice',
                ]);
                $question2->options()->createMany([
                    ['option' => 'Earth'],
                    ['option' => 'Mars'],
                    ['option' => 'Jupiter'],
                    ['option' => 'Venus'],
                ]);

                // True/False Question 1
                $question3 = Question::create([
                    'question' => 'The Earth is flat.',
                    'correct_answer' => 'False',
                    'type' => 'true_false',
                ]);

                // Multiple Choice Question 3
                $question4 = Question::create([
                    'question' => 'Which of these animals is a mammal?',
                    'correct_answer' => 'Whale',
                    'type' => 'multiple_choice',
                ]);
                $question4->options()->createMany([
                    ['option' => 'Whale'],
                    ['option' => 'Crocodile'],
                    ['option' => 'Shark'],
                    ['option' => 'Octopus'],
                ]);

                // Short Answer Question 1
                $question5 = Question::create([
                    'question' => 'What is the chemical formula for water?',
                    'correct_answer' => 'H2O',
                    'type' => 'short_answer',
                ]);

                // Multiple Choice Question 4
                $question6 = Question::create([
                    'question' => 'What is the largest ocean on Earth?',
                    'correct_answer' => 'Pacific Ocean',
                    'type' => 'multiple_choice',
                ]);
                $question6->options()->createMany([
                    ['option' => 'Atlantic Ocean'],
                    ['option' => 'Pacific Ocean'],
                    ['option' => 'Indian Ocean'],
                    ['option' => 'Southern Ocean'],
                ]);

                // True/False Question 2
                $question7 = Question::create([
                    'question' => 'The sun is a star.',
                    'correct_answer' => 'True',
                    'type' => 'true_false',
                ]);

                // Multiple Choice Question 5
                $question8 = Question::create([
                    'question' => 'Which is the smallest planet in the Solar System?',
                    'correct_answer' => 'Mercury',
                    'type' => 'multiple_choice',
                ]);
                $question8->options()->createMany([
                    ['option' => 'Venus'],
                    ['option' => 'Earth'],
                    ['option' => 'Mercury'],
                    ['option' => 'Mars'],
                ]);

                // Short Answer Question 2
                $question9 = Question::create([
                    'question' => 'Who developed the theory of relativity?',
                    'correct_answer' => 'Albert Einstein',
                    'type' => 'short_answer',
                ]);

                // Multiple Choice Question 6
                $question10 = Question::create([
                    'question' => 'Which element is represented by the symbol O?',
                    'correct_answer' => 'Oxygen',
                    'type' => 'multiple_choice',
                ]);
                $question10->options()->createMany([
                    ['option' => 'Oxygen'],
                    ['option' => 'Gold'],
                    ['option' => 'Osmium'],
                    ['option' => 'Ozone'],
                ]);

                // True/False Question 3
                $question11 = Question::create([
                    'question' => 'Water boils at 100°C at sea level.',
                    'correct_answer' => 'True',
                    'type' => 'true_false',
                ]);

                // Multiple Choice Question 7
                $question12 = Question::create([
                    'question' => 'Which country is known as the Land of the Rising Sun?',
                    'correct_answer' => 'Japan',
                    'type' => 'multiple_choice',
                ]);
                $question12->options()->createMany([
                    ['option' => 'Japan'],
                    ['option' => 'China'],
                    ['option' => 'India'],
                    ['option' => 'Thailand'],
                ]);

                // Short Answer Question 3
                $question13 = Question::create([
                    'question' => 'What is the largest planet in the Solar System?',
                    'correct_answer' => 'Jupiter',
                    'type' => 'short_answer',
                ]);

                // Multiple Choice Question 8
                $question14 = Question::create([
                    'question' => 'Which is the longest river in the world?',
                    'correct_answer' => 'Amazon River',
                    'type' => 'multiple_choice',
                ]);
                $question14->options()->createMany([
                    ['option' => 'Nile River'],
                    ['option' => 'Amazon River'],
                    ['option' => 'Yangtze River'],
                    ['option' => 'Mississippi River'],
                ]);

                // True/False Question 4
                $question15 = Question::create([
                    'question' => 'The human body has 206 bones.',
                    'correct_answer' => 'True',
                    'type' => 'true_false',
                ]);

                // Multiple Choice Question 9
                $question16 = Question::create([
                    'question' => 'What is the speed of light?',
                    'correct_answer' => '299,792 km/s',
                    'type' => 'multiple_choice',
                ]);
                $question16->options()->createMany([
                    ['option' => '299,792 km/s'],
                    ['option' => '300,000 km/s'],
                    ['option' => '100,000 km/s'],
                    ['option' => '150,000 km/s'],
                ]);

                // Short Answer Question 4
                $question17 = Question::create([
                    'question' => 'Who was the first president of the United States?',
                    'correct_answer' => 'George Washington',
                    'type' => 'short_answer',
                ]);

                // Multiple Choice Question 10
                $question18 = Question::create([
                    'question' => 'Which gas do plants use for photosynthesis?',
                    'correct_answer' => 'Carbon Dioxide',
                    'type' => 'multiple_choice',
                ]);
                $question18->options()->createMany([
                    ['option' => 'Oxygen'],
                    ['option' => 'Carbon Dioxide'],
                    ['option' => 'Nitrogen'],
                    ['option' => 'Methane'],
                ]);

                // True/False Question 5
                $question19 = Question::create([
                    'question' => 'Humans can live without oxygen for long periods of time.',
                    'correct_answer' => 'False',
                    'type' => 'true_false',
                ]);

                // Multiple Choice Question 11
                $question20 = Question::create([
                    'question' => 'Which of these is not a primary color?',
                    'correct_answer' => 'Green',
                    'type' => 'multiple_choice',
                ]);
                $question20->options()->createMany([
                    ['option' => 'Red'],
                    ['option' => 'Blue'],
                    ['option' => 'Green'],
                    ['option' => 'Yellow'],
                ]);

    }
}
