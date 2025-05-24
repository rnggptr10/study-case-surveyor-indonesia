<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssignedSurvey extends Model
{
    protected $fillable = [
        'user_id',
        'survey_id',
        'assigned_at',
        'filled_at',
        'dominant_style',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
