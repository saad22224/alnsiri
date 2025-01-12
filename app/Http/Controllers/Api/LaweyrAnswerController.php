<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lawyer_answers;
use Illuminate\Support\Facades\Validator;
class LaweyrAnswerController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_id' => 'required|exists:question,id',
            'answer' => 'required|string',
            'lawyer_id' => 'required|exists:lawyer,id',
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
    public function getAnswersByLawyerId($lawyer_id)
    {
        try {
            $answers = Lawyer_answers::where('lawyer_id', $lawyer_id)->get();
            if ($answers->isEmpty()) {
                return response()->json(['message' => 'No answers found for this lawyer'], 404);
            }

            return response()->json(
                [
                    'message' => 'success get answers',
                    'data' => $answers,
                    'questions' => $answers->map(function($answer) {
                        return [
                            'question_title' => $answer->question->question_title,
                            'question_content' => $answer->question->question_content,
                            'question_id' => $answer->question->id,
                        ];
                    }),
                ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching answers'], 500);
        }
    }
}
