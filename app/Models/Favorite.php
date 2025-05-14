<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function favoriteable()
    {
        return $this->morphTo();
    }
}
