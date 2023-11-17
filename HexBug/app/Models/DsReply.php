<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DsReply extends Model
{
    use HasFactory;

    protected $table = 'replies';

    protected $fillable = [
        'content',
        'user_id',
        'discussion_id',

    ];
}
