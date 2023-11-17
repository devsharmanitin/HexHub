<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $table = 'discussion';

    protected $fillable = ['user_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function parent()
    {
        return $this->belongsTo(Discussion::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Discussion::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(DsReply::class);
    }
}
