<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\QuizSubmission;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Show the exam difficulty selection page.
     */
    public function showExamDifficulty()
    {
        return view('pages.exam_difficulty');
    }

    /**
     * Display the exam questions from the API and save them to the database.
     */
    public function startExam(Request $request)
    {
        $apiUrl = 'https://nha-tutor.onrender.com/take-exam';

        try {
            $response = Http::timeout(300)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->withBody('{}', 'application/json') // ✅ force empty JSON object
                ->post($apiUrl);
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return redirect()->back()->with('error', 'The exam service is taking too long or is unavailable. Please try again later.');
        }

        $result = $response->json();
        if (!$response->successful() || !isset($result['questions']) || empty($result['questions'])) {
            return redirect()->back()->with('error', 'Failed to retrieve exam questions. The external service may be experiencing issues. Please try again.');
        }

        // Create quiz submission record
        $submission = QuizSubmission::create([
            'user_id' => Auth::id(),
            'topic_name' => 'Exam',
            'score' => 0,
            'total_questions' => $result['question_count'] ?? count($result['questions']),
            'answers' => $result['questions'], // Store all question data
            'wrong_questions' => [],
        ]);

        return view('pages.exam', [
            'data' => $result,
            'submission_id' => $submission->id
        ]);
    }


    /**
     * Process the exam submission, calculate the score, and save to the database.
     */
    public function submitExam(Request $request)
    {
        $submissionId = $request->input('submission_id');
        $submission = QuizSubmission::find($submissionId);


        if (!$submission) {
            return redirect()->back()->with('error', 'Exam submission record not found.');
        }

        $userAnswers = $request->input('answers');

        $score = 0;
        $quizDetails = [];
        $wrongQuestions = [];
        foreach ($submission->answers as $key => $question) {
            $questionIndex = $key + 1;

            $userSelectedAnswer = $userAnswers[$questionIndex] ?? null;

            $isCorrect = false;

            // *** THIS IS THE FIX ***
            // The API for exams provides the correct answer text directly.
            $correctAnswerText = $question['options'][$question['answer']];

            if ($userSelectedAnswer == $correctAnswerText) {
                $score++;
                $isCorrect = true;
            } else {
                $wrongQuestions[] = [
                    'question' => $question['question'],
                    'answer' => $question['explanation'],
                ];
            }

            $quizDetails[] = [
                'question' => $question['question'],
                'user_answer' => $userSelectedAnswer,
                'correct_answer' => $correctAnswerText,
                'explanation' => $question['explanation'],
                'is_correct' => $isCorrect,
            ];
        }

        $submission->update([
            'score' => $score,
            'answers' => $quizDetails,
            'wrong_questions' => $wrongQuestions,
        ]);

        // Redirect to the results page, passing the submission ID
        return redirect()->route('quiz.results', ['submission_id' => $submission->id]);
    }
}
