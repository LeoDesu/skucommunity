<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name'
    ];
    public $timestamps = false;

    public function majors(){
        return $this->belongsToMany(Major::class)->withPivot('quota');
    }
    public function schedules(){
        return $this->hasMany(Subject::class);
    }
    public function teachers(){
        return $this->belongsToMany(User::class);
    }
}
