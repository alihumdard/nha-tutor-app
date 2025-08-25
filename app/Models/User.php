<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes , Billable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'phone',
        'address',
        'role',
        'user_pic',
        'com_name',
        'com_pic',
        'country',
        'zip_code',
        'city',
        'state',
        'otp',
        'reset_pswd_time',
        'reset_pswd_attempt',
        'staff_id',
        'sadmin_id',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function getPlanName()
    {
        if ($this->role === 'admin') {
            return 'Admin';
        }

        if (!$this->subscribed('default')) {
            return null;
        }

        $content = HomepageContent::first();
        $plans = $content ? $content->plans : [];
        $userPlanStripeId = $this->subscription('default')->stripe_price;

        $planMap = [
            isset($plans[0]['stripe_price_id']) ? $plans[0]['stripe_price_id'] : null => 'Half In',
            isset($plans[1]['stripe_price_id']) ? $plans[1]['stripe_price_id'] : null => 'All In',
            isset($plans[2]['stripe_price_id']) ? $plans[2]['stripe_price_id'] : null => 'All or Nothing',
        ];

        return $planMap[$userPlanStripeId] ?? 'Unknown Plan';
    }
}
