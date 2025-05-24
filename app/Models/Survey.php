<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function assignedSurveys(): HasMany
    {
        return $this->hasMany(AssignedSurvey::class);
    }

}
