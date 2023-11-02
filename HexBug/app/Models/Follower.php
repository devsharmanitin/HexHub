<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    protected $table = 'followers';

    protected $fillable = [
        'follower_id' , 'following_id'  , 'status'
    ];

    public function follower(){
        return $this->belongsToMany(User::class ,'followers', 'following_id', 'follower_id')
        ->wherePivot('status','accepted');
    }

    public function following(){
        return $this->belongsToMany(User::class , 'followers', 'follower_id', 'following_id')
        ->wherePivot('status','accepted');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'following_id');
    }



}
