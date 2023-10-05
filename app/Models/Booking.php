<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){

        $this->belongsTo(User::class);
    }

    public function course(){

        return $this->belongsTo(Course::class);
    }

    public function subscriptionUser()
    {
        return $this->belongsTo(SubscriptionUser::class);
    }
}
