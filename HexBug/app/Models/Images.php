<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';

    protected $fillable = [
        'url', 'desc'
    ];



    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}
