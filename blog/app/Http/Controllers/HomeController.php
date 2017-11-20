<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Blog\User;
use Blog\Number;
use Auth;
use View;
use Blog\Post;
use Blog\Comment;
use Blog\Http\Requests\UpdateDataRequest;
use Blog\Http\Requests\PhoneNumberRequest;
use Blog\Http\Requests\PostRequest;
use Blog\Http\Requests\CommentRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showProfile()
    {
        $user_number = User::find(Auth::user()->id)->phone;
        return view('profile', ['number' => $user_number->number]);
    }

    public function uploadProfilePicture()
    {
        return view('upload');
    }

    public function postUploadedData(Request $request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $file_ext = $request->file('image')->getClientOriginalExtension();
        $file_size = $request->file('image')->getSize();
        $file_type = $request->file('image')->getMimeType();
        $file_path = $request->file('image')->getRealPath();
        $result = $request->file('image')->move('C:\xampp\htdocs\blog\public\images', $file_name);
        $user = Auth::user();
        $user->image = 'images/'.$file_name;
        $user->save();
        return redirect()->route('profile');
    }

    public function updateUserData()
    {
        return View::make('update');
    }

    public function getNewData(UpdateDataRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $user = Auth::user();
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return redirect()->route('profile');
    }

    public function phoneNumberForm()
    {
        return View::make('phone');
    }

    public function numberValue(PhoneNumberRequest $request)
    {
        $number = $request->number;
        $user_id = Auth::user()->id;
        $add = Number::create([
            'user_id' => $user_id,
            'number' => $number
        ]);
        return redirect()->route('profile');
    }

    public function showPhoneNumber()
    {
        $user_number = User::find(Auth::user()->id)->phone;
    }

    public function multipleFileUploadForm()
    {
        return View::make('multiple');
    }

    public function postUpload(Request $request)
    {
        $files = $request->file('images');
        foreach ($files as $file) {
            $file->store('files');
        }
        return redirect()->route('profile');
    }

    public function postForm()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return View::make('post', ['posts' => $posts, 'comments' => $comments]);
    }

    public function postData(PostRequest $request)
    {
        $post = $request->post;
        $add = Post::create([
            'user_id' => Auth::user()->id,
            'post' => $post
        ]);
        return redirect()->route('post');
    }

    public function showPosts()
    {
        $posts = User::find(Auth::user()->id)->posts;
        $comments = User::find(Auth::user()->id)->comments;
        return View::make('posts', ['posts' => $posts, 'comments' => $comments]);
    }

    public function getCommentValue(CommentRequest $request)
    {
        $comment = $request->comment;
        $user_id = Auth::user()->id;
        $add = Comment::create([
            'user_id' => $user_id,
            'comment' => $comment
        ]);
        return redirect()->route('posts');
    }

    public function showAllComments()
    {
        $comments = Comment::all();
        return View::make('comments')->with('comments', $comments);
    }

    public function showAllPosts()
    {
        $posts = Post::all();
        return View::make('allposts')->with('posts', $posts);
    }
}
