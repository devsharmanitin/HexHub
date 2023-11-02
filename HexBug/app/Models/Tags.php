<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostTags;


class Tags extends Model
{
    use HasFactory;

    protected $table = 'tags';    
    protected $fillable = [
        'tag' 
    ];

    public function posts(){
        return $this->belongsToMany(Post::class,'post_tag');
    }
}
