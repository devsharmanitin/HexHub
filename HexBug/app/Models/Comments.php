<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = "comments";

    protected $fillable = ['post_id' , 'user_id' , 'comment'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function replies(){
        return $this->hasMany(Comments::class , 'parent_id');
    }

    public function parentcomment(){
        return $this->belongsTo(Comments::class , 'parent_id');
    }


}
