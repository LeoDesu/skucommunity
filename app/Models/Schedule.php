<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'starttime',
        'endtime',
        'classroom_id',
        'user_id',
        'subject_id'
    ];
    protected $dates = ['date'];
    public $timestamps = false;

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
    public function teacher(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function majors(){
        return $this->belongsToMany(Major::class);
    }

}
