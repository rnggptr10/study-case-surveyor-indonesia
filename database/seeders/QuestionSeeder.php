<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = include database_path('data/questions.php');

        $survey = Survey::first();

        foreach ($data as $item) {
            // Simpan question
            $question = Question::create([
                'situation' => $item['situasi'],
                'survey_id' => $survey->id,
            ]);

            // Simpan answer untuk question
            foreach ($item['options'] as $answer) {
                Option::create([
                    'question_id' => $question->id,
                    'text'        => $answer['text'],
                    'style'       => $answer['style'],
                ]);
            }
        }
    }
}
