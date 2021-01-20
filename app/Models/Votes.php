<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    use HasFactory;
    protected $table = 'blog_user';
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function blogs(){
        return $this->belongsTo(Blog::class);
    }
}
