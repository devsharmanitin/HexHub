<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\models\Message;

// Stripe Cashier 
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable  ;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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

    protected $nullable = [
        'username' ,
        'address',
        'gender',
        'number',
        'status',
        'image',
   
    ];

    public function posts(){
        return $this->hasMany(Post::class , 'author_id');
    }

    // users that are followed by this user
    public function following() {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id')
            ->wherePivot('status', 'accepted');
    }
    

    public function follower(){
        return $this->belongsToMany(User::class , 'followers' , 'follower_id' , 'following_id')
            ->wherePivot('status', 'accepted');
    }

    public function pendingrequest(){
        return $this->belongsToMany(User::class,'follow_request','following_id','follower_id')
            ->wherePivot('status' , 'pending');

    }


        public function subscriptions(){
            return $this->hasMany(UserSubscription::class);
        }

    

    
}



