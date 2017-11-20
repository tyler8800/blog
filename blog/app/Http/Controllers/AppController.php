<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Blog\Http\Requests\PostCommentRequest;
use Blog\Comment;
use Blog\User;
use Auth;
use Mail;
use Blog\Mail\WelcomeMail;

class AppController extends Controller
{
    public function postComments(PostCommentRequest $request)
    {
    	$comment = $request->co;
    	$post_id = $request->id;
    	$user = Auth::user();
    	$add = Comment::create([
    		'user_id' => $user->id,
    		'post_id' => $post_id,
    		'comment' => $comment
    	]);
    	return redirect()->route('post');
    }

    public function sendEmail()
    {
    	$user = Auth::user();
    	$send_email = Mail::to($user->email)->send(new WelcomeMail($user->name));
    	return redirect()->route('profile');
    }
}
