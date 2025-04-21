<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'body', 'user_id'];

    public function PostToUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
