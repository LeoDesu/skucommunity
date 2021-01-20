<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'surname',
        'gender',
        'date_of_birth',
        'address',
        'role',
        'major_id',
        'tel',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function blogs(){
        return $this->hasMany(Blog::class);
    }
    public function votes(){
        return $this->belongsToMany(Blog::class)->withPivot('upvote')->withPivot('downvote');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function teachSchedules(){
        return $this->hasMany(Schedule::class);
    }
    public function teachSubjects(){
        return $this->belongsToMany(Subject::class);
    }

    public static function boot(){
        parent::boot();
        static::created(function($user){
            $user->profile()->create([
                'image' => 'img/server/profile.png',
                'about' => 'ຍັງບໍ່ມີຂໍ້ມູນຫຍັງກ່ຽວກັບຜູ້ໃຊ້ຄົນນີ້'
            ]);
        });
        
        static::deleted(function($user){
            $user->profile->delete();
        });
    }
}
