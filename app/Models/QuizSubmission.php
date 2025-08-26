<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module_id',
        'status', // Add this line
        'topic_name',
        'score',
        'total_questions',
        'answers',
        'wrong_questions',
    ];

    protected $casts = [
        'answers' => 'array',
        'wrong_questions' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->nullable();
    }
}