<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'timestamp',
        'content',
        'attachment',
        'views'
    ];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function votes(){
        return $this->belongsToMany(User::class)->withPivot('upvote')->withPivot('downvote');
    }
}
