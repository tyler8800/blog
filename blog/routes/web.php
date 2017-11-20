<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/profile', 'HomeController@showProfile')->name('profile');

Route::get('/profile/picture', 'HomeController@uploadProfilePicture')->name('image');
Route::post('/profile/picture', 'HomeController@postUploadedData');

Route::get('/update/data', 'HomeController@updateUserData')->name('update');
Route::patch('/update/data', 'HomeController@getNewData');

Route::get('/phone/number', 'HomeController@phoneNumberForm')->name('phone');
Route::post('/phone/number', 'HomeController@numberValue');

Route::get('/number', 'HomeController@showPhoneNumber')->name('number');

Route::get('/multiple/file/upload', 'HomeController@multipleFileUploadForm')->name('files');
Route::post('/multiple/file/upload', 'HomeController@postUpload');

Route::get('/create/post', 'HomeController@postForm')->name('post');
Route::post('/create/post', 'HomeController@postData');

Route::get('/show/posts', 'HomeController@showPosts')->name('posts');

Route::post('/create/comment', 'HomeController@getCommentValue')->name('comment');

Route::get('/show/comments', 'HomeController@showAllComments')->name('comments');

Route::get('/show/all/posts', 'HomeController@showAllPosts')->name('all.posts');

////////////////////////////////////////////////////////////////////////////////////////////////////

Route::post('/add/post/comment', 'AppController@postComments')->name('post.comment');

Route::get('/send/email', 'AppController@sendEmail')->name('email');

////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/register/admin', 'AdminController@registerAdmin')->name('admin');
Route::post('/register/admin', 'AdminController@adminData');

Route::get('/login/admin', 'AdminController@getAdminLoginForm')->name('admin.log');
Route::post('/login/admin', 'AdminController@adminLoginData');

Route::get('/show/admin/panel', 'AdminController@showAdminPanel')->name('admin.panel');

Route::get('/admin/logout', 'AdminController@logOutAdmin')->name('out');
