<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'faculty'];
    public $timestamps = false;

    public function users(){
        return $this->hasMany(User::class);
    }
    public function subjects(){
        return $this->belongsToMany(Subject::class)->withPivot('quota');
    }
    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
}
