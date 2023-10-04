<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function booking()
    {
        if(!request()->user()){
            return null;
        }

        return $this->hasOne(Booking::class)->where('bookings.user_id', request()->user()->id);
    }

}
