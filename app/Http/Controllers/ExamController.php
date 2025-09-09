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
    $difficulty = $request->input('difficulty');
    $apiUrl = 'https://nha-tutor.onrender.com/take-exam';

    // Make the API call with the selected difficulty and a longer timeout
    try {
        $response = Http::timeout(300)->post($apiUrl, [
            'difficulty' => $difficulty,
        ]);
    } catch (\Illuminate\Http\Client\RequestException $e) {
        // Handle HTTP-level errors like timeouts
        return redirect()->back()->with('error', 'The exam service is taking too long or is unavailable. Please try again later.');
    }

    $result = $response->json();

    // Add a check to ensure the API response is successful and contains questions
    if (!$response->successful() || !isset($result['questions']) || empty($result['questions'])) {
        return redirect()->back()->with('error', 'Failed to retrieve exam questions. The external service may be experiencing issues. Please try again.');
    }

    // Create a new quiz submission record and store all questions and correct answers
    $submission = QuizSubmission::create([
        'user_id' => Auth::id(), // Use the logged-in user's ID
        'topic_name' => 'Exam', // Use a generic topic name for exams
        'score' => 0, // Initial score is 0
        'total_questions' => count($result['questions']),
        'answers' => $result['questions'], // Store all question data here
        'wrong_questions' => [],
    ]);

    return view('pages.exam', [
        'data' => $result,
        'difficulty' => $difficulty,
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
            $correctAnswerText = $question['answer'];

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