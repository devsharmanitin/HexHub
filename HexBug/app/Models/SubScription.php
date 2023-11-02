<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubScription extends Model
{
    use HasFactory;
    protected $table = 'subscription';

    protected $fillable = [
        'name' ,    'price'  , 
        'content' , 'timing' , 
        'validity' , 'is_active' ,
        'description' ,
    ];

    public function userSubscriptions(){
        return $this->hasMany(UserSubscription::class);
    }

}
