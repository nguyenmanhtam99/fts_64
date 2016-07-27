<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * SoftDelete
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Relationships
     */
    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'user_questions');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
