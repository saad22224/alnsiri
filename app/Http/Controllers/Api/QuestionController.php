<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
class QuestionController extends Controller
{
    public function index()
    {
        try {
            $questions = Question::all();
            return response()->json($questions);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve questions', 'message' => $e->getMessage()], 500);
        }
    }
    public function createQuestion(Request $request)
    {
        $request->validate([
            'question_title' => 'required|string',
            'question_content' => 'required|string',
            'question_city' => 'required|string',
            'question_status' => 'required|string',
            'contact_method' => 'required|string',
            'case_specialization' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);
        $question = Question::create($request->all());
        return response()->json([
            'message' => 'Question created successfully',
            'question' => $question
        ], 201);
    }
    public function getQuestionById($id)
    {
        $question = Question::find($id);

        if (!$question) {
            return response()->json(['error' => 'Question not found'], 404);
        }

        return response()->json($question);
    }
    public function updateQuestion(Request $request, $id)
    {
        $question = Question::where('id', $id)->where('user_id', $request->user_id)->first();

        $this->authorize('update', $question);

        $question->update($request->all());
        return response()->json([
            'message' => 'Question updated successfully',
            'question' => $question
        ], 200);
    }
    public function deleteQuestion(Request $request, $id)
    {
        $question = Question::where('id', $id)->where('user_id', $request->user_id)->first();
        if ($question) {
            $question->delete();
            return response()->json(['message' => 'Question deleted successfully']);
        } else {
            return response()->json(['error' => 'Question not found or you do not have permission to delete this question'], 404);
        }
    }
public function getQuestionsByUserId($user_id)
{
    try {
        $questions = Question::where('user_id', $user_id)->get();

        if ($questions->isEmpty()) {
            return response()->json(['error' => 'No questions found for this user'], 404);
        }

        $user = $questions->first()->user;

        return response()->json([
            'questions' => $questions,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'number_of_questions' => $questions->count()
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while fetching the questions'], 500);
    }
}
}
