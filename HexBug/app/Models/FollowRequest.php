<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowRequest extends Model
{
    use HasFactory;

    protected $table = 'follow_request';

    protected $fillable = [
        'follower_id' , 'following_id'  , 'status'
    ];

    public function senders(){
        return $this->belongsTo(User::class , 'follower_id');
    }


    public function recipient(){
        return $this->belongsTo(User::class , 'following_id');
    }

    public function user(){
        return $this->belongsTo(User::class ,  'following_id');
    }


}
