<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;
use Blog\User;

class Number extends Model
{
    protected $table = 'numbers';

    protected $fillable = ['user_id', 'number'];

    public function user()
    {
    	return $this->belongsTo('Blog\User');
    }
}
