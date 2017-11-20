<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['user_id', 'post'];

    public function user()
    {
    	return $this->belongsTo('Blog\User');
    }

    public function comments()
    {
    	return $this->hasMany('Blog\Comment');
    }
}
