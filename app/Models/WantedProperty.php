<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WantedProperty extends Model
{
    public function wantedPropertyable()
    {
        return $this->morphTo();
    }
    public function requests()
{
    return $this->morphMany(Request::class, 'requestable');
}
}
