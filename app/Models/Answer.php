<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    /**
     * SoftDelete
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Relationships
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function examQuestion()
    {
        return $this->belongsTo(ExamQuestion::class);
    }
}
