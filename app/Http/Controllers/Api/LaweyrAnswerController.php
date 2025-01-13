<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lawyer_answers;
use Illuminate\Support\Facades\Validator;
use App\Models\Question;
class LaweyrAnswerController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_uuid' => 'required|exists:question,uuid',
            'answer' => 'required|string',
            'lawyer_uuid' => 'required|exists:lawyer,uuid',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $lawyerAnswer = Lawyer_answers::create($validator->validated());
        return response()->json(
            [
                'message' => 'Answer stored successfully',
                'data' => $lawyerAnswer
            ], 201);
    }
    public function getAnswersByLawyerUUID($lawyer_uuid)
    {
        try {
            $answers = Lawyer_answers::where('lawyer_uuid', $lawyer_uuid)->get();
            if ($answers->isEmpty()) {
                return response()->json(['message' => 'No answers found for this lawyer'], 404);
            }
            $questions = Question::whereIn('uuid', $answers->pluck('question_uuid'))->get();
            return response()->json(
                [
                    'message' => 'success get answers',
                    'data' => $answers,
                    'questions' => $questions->map(function($question) {
                        return [
                            'question_title' => $question->question_title,
                            'question_content' => $question->question_content,
                            'question_uuid' => $question->uuid,
                        ];
                    }),
                ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching answers', 'message' => $e->getMessage()], 500);
        }
    }
}
