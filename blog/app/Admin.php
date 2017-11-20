<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'password', 'role'];
}
