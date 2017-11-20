<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['user_id', 'post_id', 'comment'];

    public function post()
    {
    	return $this->belongsTo('Blog\Post');
    }

    public function user()
    {
    	return $this->belongsTo('Blog\User');
    }
}
