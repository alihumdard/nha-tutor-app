<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\QuizSubmission;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function all_quizzes()
    {
        return view('pages.all_quizzes');
    }

    public function all_modules()
    {
        return view('pages.all_modules');
    }

    public function showQuiz($topic_name)
    {
        $result = [];
        if ($topic_name) {
            $apiUrl = 'https://nha-tutor.onrender.com/take-quiz';
            $response = Http::timeout(120)->post($apiUrl, [
                'topic' => $topic_name,
            ]);
            $result = $response->json();
        }

        $submission = QuizSubmission::create([
            'user_id' => Auth::id(),
            'topic_name' => $topic_name,
            'score' => 0, // Initial score is 0
            'total_questions' => count($result['questions']),
            'answers' => $result['questions'], // Store all question data here
            'wrong_questions' => [],
        ]);

        return view('pages.quiz', ['data' => $result, 'topic_name' => $topic_name, 'submission_id' => $submission->id]);
    }

    /**
     * Process the quiz submission, calculate the score, and save to the database.
     */
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

        // Loop through the questions stored in the database record to check user answers
        foreach ($submission->answers as $key => $question) {
            $questionIndex = $key + 1;

            $userSelectedAnswer = $userAnswers[$questionIndex] ?? null;
            $isCorrect = false;

            if ($userSelectedAnswer == $question['options'][$question['answer']]) {
                $score++;
                $isCorrect = true;
            } else {
                $wrongQuestions[] = [
                    "question" => $question['question'],
                    "answer"   => $question['explanation'],
                ];
            }


            $quizDetails[] = [
                'question' => $question['question'],
                'user_answer' => $userSelectedAnswer,
                'correct_answer' => $question['options'][$question['answer']],
                'explanation' => $question['explanation'],
                'is_correct' => $isCorrect,
            ];
        }

        $submission->update([
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
