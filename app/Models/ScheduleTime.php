<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleTime extends Model
{
    use HasFactory;
    protected $fillable = ['from', 'to'];
    public $timestamps = false;
    public function schedules(){
        return $this->hasMany(Schedule::class, 'starttime');
    }
}
