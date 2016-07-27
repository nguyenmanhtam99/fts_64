<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    /**
     * SoftDelete
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Relationships
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_questions');
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_questions');
    }
}
