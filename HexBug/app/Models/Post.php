<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tags;


class Post extends Model
{
    // use HasFactory;
    // protected $primaryKey = 'post_id'; // Primary key 
    protected $fillable = [ 'post_title' , 'post_content' , 'post_desc' , 'author_id' ];

    public function images(){
        return $this->hasMany(Images::class);
    }
    public function author(){
        return $this->belongsTo(User::class , 'author_id');
    }


    public function  tags(){
        return $this->belongsToMany(Tags::class , 'post_tag');                                                                                                                                
    }
}

