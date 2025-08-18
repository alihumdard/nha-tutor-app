<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizSubmission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'topic_name',
        'score',
        'total_questions',
        'answers',
        'wrong_questions',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'answers' => 'array',
        'wrong_questions' => 'array', // Cast the new column to an array
    ];

    /**
     * Get the user that owns the quiz submission.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->nullable();
    }
}