<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'image', 'about'];
    public $timestamps = false;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
