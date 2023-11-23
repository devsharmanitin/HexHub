<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\models\Message;
use App\Models\Comments;
use Usamamuneerchaudhary\Commentify\Traits\HasUserAvatar;
use Illuminate\Support\Str;

// Stripe Cashier 
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasUserAvatar;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        'username',
        'address',
        'gender',
        'number',
        'status',
        'image',

    ];


    // app/User.php

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\ //HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Remove non-alphanumeric characters (except for periods) from the email
            $modifiedEmail = preg_replace('/[^a-zA-Z0-9.]+/', '', $model->email);
            $emailParts = explode('@', $model->email);


            // Shuffle the characters in each part
            $shuffledUsername = str_shuffle($emailParts[0]);
            $shuffledDomain = str_shuffle($emailParts[1]);
            $shuffeledslug = ($shuffledUsername . ' ' . $shuffledDomain);


            $instance = new self;
            $result = $instance->splitAndJoin($shuffeledslug);

            // Generate the slug based on the modified email
            $model->slug = Str::slug($result, '-');
        });
    }


    public function splitAndJoin($string, $numParts = 4)
    {
        // Generate random lengths for each part
        $lengths = [];
        for ($i = 0; $i < $numParts - 1; $i++) {
            $lengths[] = rand(1, strlen($string) - array_sum($lengths) - ($numParts - $i - 1));
        }

        // Add the remaining length for the last part
        $lengths[] = strlen($string) - array_sum($lengths);

        // Split the string into parts based on the random lengths
        $parts = [];
        $start = 0;
        foreach ($lengths as $length) {
            $parts[] = substr($string, $start, $length);
            $start += $length;
        }

        // Join the parts with spaces
        $result = implode(' ', $parts);

        return $result;
    }


    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    // users that are followed by this user
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id')
            ->wherePivot('status', 'accepted');
    }


    public function follower()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id')
            ->wherePivot('status', 'accepted');
    }

    public function pendingrequest()
    {
        return $this->belongsToMany(User::class, 'follow_request', 'following_id', 'follower_id')
            ->wherePivot('status', 'pending');
    }


    public function subscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
}
