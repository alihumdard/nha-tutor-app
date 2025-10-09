<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\QuizSubmission;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function all_quizzes()
    {
        $coreModules = Module::where('category', 'core')->get();
        $losModules = Module::where('category', 'los')->get();
        return view('pages.all_quizzes', compact('coreModules', 'losModules'));
    }

    public function all_modules()
    {
        $coreModules = Module::where('category', 'core')->get();
        $losModules = Module::where('category', 'los')->get();
        return view('pages.all_modules', compact('coreModules', 'losModules'));
    }

    public function showQuiz(Module $module)
    {
        // Check if the user has already completed a quiz for this module
        // $existingSubmission = QuizSubmission::where('user_id', Auth::id())
        //     ->where('module_id', $module->id)
        //     ->where('status', 'completed')
        //     ->first();

        // if ($existingSubmission) {
        //     return redirect()->route('dashboard')->with('error', 'You have already completed the quiz for this module.');
        // }

        $topic_name = $module->title;

        $result = [];
        if ($topic_name) {
            $apiUrl = 'https://nha-tutor.onrender.com/take-quiz';
            $response = Http::timeout(120)->post($apiUrl, [
                'topic' => $topic_name,
                'lesson_type' => strtoupper($module->category),
            ]);

            $result = $response->json();
        // API endpoint
            $apiUrl_lesson = 'https://nha-tutor.onrender.com/view-lesson';

            // Send request to API
            $response_lesson = Http::timeout(120)->post($apiUrl_lesson, [
                'topic' => $topic_name,
                'lesson_type' => strtoupper($module->category),
            ]); 
            $result_lesson = $response_lesson->json();

        }


        $submission = QuizSubmission::create([
            'user_id' => Auth::id(),
            'module_id' => $module->id,
            'status' => 'pending',
            'topic_name' => $topic_name,
            'score' => 0,
            'total_questions' => $result['question_count'] ?? 0,
            'answers' => $result['questions'],
            'generation_time' => $result['generation_time'],
            'wrong_questions' => [],
        ]);

        return view('pages.quiz', ['data' => $result, 'data_lesson' => $result_lesson, 'topic_name' => $topic_name, 'submission_id' => $submission->id]);
    }


    public function submitQuiz(Request $request)
    {
        $submissionId = $request->input('submission_id');
        $submission = QuizSubmission::find($submissionId);
        if (!$submission) {
            return redirect()->back()->with('error', 'Quiz submission record not found.');
        }

        $userAnswers = $request->input('answers');
        $score = 0;
        $quizDetails = [];
        $wrongQuestions = [];

        foreach ($submission->answers as $key => $question) {
            $questionIndex = $key + 1;
            $userSelectedAnswer = $userAnswers[$questionIndex] ?? null;
            $isCorrect = ($userSelectedAnswer == $question['options'][$question['answer']]);

            if ($isCorrect) {
                $score++;
            } else {

                $wrongQuestions[] = [
                    "question" => $question['question'],
                    "answer"   => $question['explanation'],
                ];
                // $wrongQuestions['questions'][] = [
                //     "question" => $question['question'],
                //     "options" => $question['options'],
                //     "answer" => $question['answer'],
                //     "explanation"   => $question['explanation'],
                // ];
            }

            $quizDetails[] = [
                'question' => $question['question'],
                'user_answer' => $userSelectedAnswer,
                'correct_answer' => $question['options'][$question['answer']],
                'explanation' => $question['explanation'],
                'is_correct' => $isCorrect,
            ];
        }

        // $wrongQuestions += [
        //     "generation_time" => $submission->generation_time,
        //     "question_count" => $submission->total_questions,
        // ];

        $submission->update([
            'status' => 'completed', // Update status on submission
            'score' => $score,
            'answers' => $quizDetails,
            'wrong_questions' => $wrongQuestions,
        ]);

        return redirect()->route('quiz.results', ['submission_id' => $submission->id]);
    }

    public function showResults($submission_id)
    {
        $submission = QuizSubmission::findOrFail($submission_id);
        return view('pages.quiz_results', ['submission' => $submission]);
    }
}
