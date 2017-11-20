<?php

namespace Blog;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Blog\Number;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function phone()
    {
        return $this->hasOne('Blog\Number');
    }

    public function posts()
    {
        return $this->hasMany('Blog\Post');
    }

    public function comments()
    {
        return $this->hasMany('Blog\Comment');
    }
}
