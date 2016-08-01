<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    /**
     * SoftDelete
     */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'type_social', 'social_user_id'];
    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
