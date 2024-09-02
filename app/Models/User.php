<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\FCMToken;
use App\Traits\PassportUser;
use ConsulterQuestions;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;


class User extends Authenticatable 
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 
    public function setPasswordAttribute($pass)
    {
        return $this->attributes['password'] = Hash::make($pass);
    }

 
    
}
