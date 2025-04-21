<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'userID'];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey: 'userID');
    }
}
