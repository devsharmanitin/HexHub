<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;
    protected $table = 'user_subscription';

    protected $fillable = [
        'user_id' ,         'subscription_id'  , 
        'purchase_date' ,   'is_active' ,   
    ];

    public function subscriptions(){
        return $this->belongsTo(Subscription::class,'subscription_id');   
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }




}
