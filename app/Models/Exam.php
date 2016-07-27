<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    /**
     * SoftDelete
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'exam_questions');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
