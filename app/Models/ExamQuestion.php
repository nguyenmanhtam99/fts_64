<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'exam_questions';

    /**
     * Relationships
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
