<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    /**
     * SoftDelete
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Relationships
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
