<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    protected $fillable = [
        'assigned_survey_id',
        'question_id',
        'option_id',
        'style',
    ];

    public function assignedSurvey(): BelongsTo
    {
        return $this->belongsTo(AssignedSurvey::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}
