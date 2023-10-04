<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subscriptionUsers()
    {
        return $this->hasMany(SubscriptionUser::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function subscriptionTypes()
    {
        return [
            'half-year'=>[
                'months'=>6,
                'fee_per_user'=>12000.00,
                'max_courses'=>2

            ],
            'full-year'=>[
                'months'=>12,
                'fee_per_user'=>10000.00,
                'max_courses'=>4
            ],
            'two-year'=>[
                'months'=>24,
                'fee_per_user'=>8500.00,
                'max_courses'=>8
            ]
            ];
    }
}
