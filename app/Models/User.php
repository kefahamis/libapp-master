<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function getRedirectRoute()
    // {
    //     return match((int)$this->role) {
    //         1 => 'admin',
    //         2 => 'hr',
    //         3 => 'staff',
    //         // ...
    //     };
    // }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    public function organization()
    {
        return $this->hasOne(Organization::class);
    }

    public function subscriptionUsers()
    {
        return $this->hasMany(SubscriptionUser::class, 'email', 'email');
    }

    public function activeSubscriptionUser()
    {

        return $this->subscriptionUsers()
             ->join('subscriptions', 'subscriptions.id', 'subscription_users.subscription_id')
             ->where('subscriptions.status', 'active')
             ->whereRaw('subscription_users.courses_count < subscriptions.max_courses' )
             ->whereRaw("'" . date('Y-m-d H:i:s') . "' between start_date AND end_date" )
             ->first();
    }
}
