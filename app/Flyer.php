<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable = [
        'street',
        'city',
        'state',
        'country',
        'zip',
        'price',
        'description'
    ];

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-', ' ', $street);
        $street = str_replace('+', ' ', $street);

        return static::where(compact('zip', 'street'))->firstOrFail();
    }

    public function getPriceAttribute($price)
    {
        return '$'.number_format($price);
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    public function ownedBy(User $user)
    {
        if ($this->user_id == $user->id) {
            return true;
        }
        return false;
    }
}
