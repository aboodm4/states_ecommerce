<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{ protected $fillable = [
    'user_id',
    'rating',
    'reviewable_id',
    'reviewable_type',
];

    public function reviewable()
    {
        return $this->morphTo();  
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
