<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // public function owner(): MorphTo
    // {
    //     return $this->morphTo();
    // }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function video()
    {
        return $this->hasOne(Video::class); // علاقة واحدة إلى واحدة مع الفيديو
    }
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }
    public function requests()
    {
         return $this->morphMany(Request::class, 'requestable');
    }
    public function propertyPayments()
    {
      return $this->hasMany(PropertyPayment::class);
    }

}
