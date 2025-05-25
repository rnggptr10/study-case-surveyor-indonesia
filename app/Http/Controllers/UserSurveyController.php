<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AssignedSurvey;
use App\Models\Option;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserSurveyController extends Controller
{
    public function index()
    {
        $sessionUser = session('user'); // Ambil data user dari session manual

        $user = User::find($sessionUser['id']); // Cari user di database pakai ID

        if (!$user) {
            return redirect('/')->with('error', 'User tidak ditemukan.');
        }

        $assignedSurveys = $user->assignedSurveys()->with('survey')->get();


        return view('user.dashboard.index', compact('assignedSurveys'));
    }

    public function fill(AssignedSurvey $assignedSurvey)
    {
        $sessionUser = session('user');

        if (!$sessionUser || $assignedSurvey->user_id !== $sessionUser['id']) {
            abort(403, 'Unauthorized action.');
        }

        $questions = $assignedSurvey->survey->questions()->with('options')->get();

        return view('user.survey.fill', compact('assignedSurvey', 'questions'));
    }

    public function submit(Request $request, AssignedSurvey $assignedSurvey)
    {
        $sessionUser = session('user');

        if (!$sessionUser || $assignedSurvey->user_id !== $sessionUser['id']) {
            abort(403, 'Unauthorized action.');
        }

        $stylesCount = [
            'Telling' => 0,
            'Selling' => 0,
            'Participating' => 0,
            'Delegating' => 0,
        ];


        foreach ($request->input('answers', []) as $questionId => $optionId) {
            $option = Option::findOrFail($optionId);
            Answer::create([
                'assigned_survey_id' => $assignedSurvey->id,
                'question_id'        => $questionId,
                'option_id'          => $optionId,
                'style'              => $option->style,
            ]);

            $stylesCount[$option->style]++;
        }

        arsort(($stylesCount));
        $dominantStyle = array_key_first($stylesCount);

        $assignedSurvey->update([
            'dominant_style' => $dominantStyle,
            'filled_at' => now()
        ]);

        return redirect()->route('user.surveys')->with('success', 'Survey berhasil disubmit.');
    }

    public function result($id){
        $survey = AssignedSurvey::with('answer.option')->findOrFail($id);

        $stylesCount = [
            'Telling' => 0,
            'Selling' => 0,
            'Participating' => 0,
            'Delegating' => 0,
        ];

        foreach ($survey->answer as $answer) {
            $stylesCount[$answer->option->style]++;
        }

        return view('user.survey.result', compact('survey', 'stylesCount'));
    }
}
