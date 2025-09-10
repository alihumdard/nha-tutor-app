<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_heading',
        'prompet_type',
        'prompet_content',
        'main_content',
        'plans_main_heading',
        'plans',
        'why_choose_us_main_heading',
        'why_choose_us_items',
    ];

    protected $casts = [
        'plans' => 'array',
        'why_choose_us_items' => 'array',
    ];
}