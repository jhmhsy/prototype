<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // View all questions
    public function index()
    {
        if (!auth()->user()->canany(['faq-list', 'faq-view', 'faq-edit', 'faq-create', 'faq-delete'])) {
            abort(404); // forbidden / not found
        }


        $questions = Question::all();
        return view('administrator.questions.index', compact('questions'));
    }

    // Store a new question
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'extra_answer' => 'nullable|string',
        ]);

        Question::create($request->all());
        return redirect()->back()->with('success', 'Question created!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'extra_answer' => 'nullable|string',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());
        return redirect()->back()->with('success', 'Question updated!');
    }

    // Delete a question
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->back()->with('success', 'Question deleted!');
    }
}