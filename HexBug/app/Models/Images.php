<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';                                                                                                                                                                                                                                                                                                        
    protected $fillable = [
        'url' , 'post_id'  , 'desc'
    ];
    public function post(){
        return $this->belongsTo(Post::class , 'post_id');
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
}
