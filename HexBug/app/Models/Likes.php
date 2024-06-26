<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $table = "likes"; 

    protected $fillable = ['post_id' , 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
