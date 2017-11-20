<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Blog\Http\Requests\AdminRegisterRequest;
use View;
use Auth;
use Blog\Admin;
use Blog\User;
use Mail;
use Cookie;
use Blog\Mail\WelcomeAdminMail;

class AdminController extends Controller
{
    public function registerAdmin()
    {
        $cookie_value = Cookie::get('admin');
        if($cookie_value){
            return redirect()->route('admin.panel');
        } else {
    	   $user = Auth::user();
    	   return View::make('admin')->with('user', $user);
        }
    }

    public function adminData(AdminRegisterRequest $request)
    {
    	$name = $request->input('name');
    	$email = $request->input('email');
    	$password = $request->input('password');
    	$role = $request->input('role');
    	$admin = Admin::create([
    		'name' => $name,
    		'email' => $email,
    		'password' => password_hash($password, PASSWORD_DEFAULT),
    		'role' => $role
    	]);
    	if($admin){
            $key = 'admin';
            Cookie::queue($key, $email, 100);
    		Mail::to($admin->email)->send(new WelcomeAdminMail($admin->name));
    		return redirect()->route('admin.panel');
    	}
    }

    public function getAdminLoginForm()
    {
        $cookie_value = Cookie::get('admin');
        if($cookie_value){
            return redirect()->route('admin.panel');
        } else {
    	   return View::make('adminlogin');
        }
    }

    public function adminLoginData(Request $request)
    {
    	$email = $request->input('email');
    	$password = $request->input('password');
    	$box = $request->input('box');
    	$admin = Admin::where('email', $email)->first();
    	$check = password_verify($password, $admin->password);
    	if($box == 'on'){
            $key = 'admin';
    		Cookie::queue($key, $email, 100);
    	}
    	if($check){
    		return redirect()->route('admin.panel');
    	}
    }

    public function showAdminPanel()
    {
        $cookie_value = Cookie::get('admin');
        if(!$cookie_value){
            return redirect()->route('admin.log');
        } else {
            $users = User::all();
            return View::make('adminpanel', ['users' => $users]);
        }
    }

    public function logOutAdmin()
    {
        $cookie = Cookie::forget('admin');
        return redirect()->route('admin.log')->withCookie($cookie);
    }
}
