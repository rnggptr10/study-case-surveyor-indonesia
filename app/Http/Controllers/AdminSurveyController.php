<?php

namespace App\Http\Controllers;

use App\Models\AssignedSurvey;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSurveyController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalAssigned = AssignedSurvey::count();
        $totalFilled = AssignedSurvey::whereNotNull('filled_at')->count();
        $totalUnfilled = AssignedSurvey::whereNull('filled_at')->count();
        $questions = Question::with('options')->get(); // pastikan relasi 'answers' ada

        return view('admin.dashboard.index', compact(
            'totalUsers',
            'totalAssigned',
            'totalFilled',
            'totalUnfilled'
        ));
    }

    public function indexAssignSurvey()
    {
        $surveys = Survey::with('assignedSurveys')->get();
        $users = User::all();
        return view('admin.survey.assign', compact('surveys', 'users'));
    }

    public function create()
    {
        return view('admin.survey.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        Question::create([
            'text' => $request->text,
        ]);

        return redirect()->route('admin.survey.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function edit(Question $question)
    {
        return view('admin.survey.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $question->update([
            'text' => $request->text,
        ]);

        return redirect()->route('admin.survey.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.survey.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }

    public function assign(Request $request){
        $request->validate([
            'survey_id' => 'required|exists:surveys,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $existing = AssignedSurvey::where('user_id', $request->user_id)
        ->where('survey_id', $request->survey_id)
        ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Survey sudah pernah di-assign ke user ini.');
        }

        AssignedSurvey::create([
            'user_id' => $request->user_id,
            'survey_id' => $request->survey_id,
            'assigned_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Survey berhasil di-assign ke user.');
    }
}
