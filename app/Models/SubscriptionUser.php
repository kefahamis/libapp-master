<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function updateCourseCount()
    {
        $this->update(['courses_count'=>$this->bookings()->count()]);
    }
}
