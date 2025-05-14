<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['name', 'phone', 'password'];


    public function offices(): MorphMany
    {
        return $this->morphMany(Office::class, 'owner');
    }
    public function properties(): MorphMany
    {
        return $this->morphMany(Property::class, 'owner');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function wantedProperties()
    {
        return $this->morphMany(WantedProperty::class, 'wanted_Pable');
    }
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

    public function followedOffices()
    {
        return $this->belongsToMany(Office::class, 'office_followers', 'user_id', 'office_id')
                    ->withTimestamps();
    }
    public function propertyPayments()
    {
        return $this->hasMany(PropertyPayment::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
