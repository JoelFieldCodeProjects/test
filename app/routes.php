<?php

/*
Basic explaining of what the functions return will be explained in the routes comments
In depth explanation of what exactly is happening will be explained in the function comments down the bottom of the page
*/



Route::post('user/login', array('as' => 'user.login', 'uses' => 'UserController@login'));

Route::get('user/logout', array('as' => 'user.logout', 'uses' => 'UserController@logout'));

Route::get('user/search', array('as' => 'user.search', 'uses' => 'UserController@search'));

Route::get('friend/show', array('as' => 'friend.show', 'uses' => 'FriendController@show'));

Route::get('profile', array('as' => 'user.profile', 'uses' => 'UserController@profile'));

Route::get('/', function(){
    
    return View::make('user.search');
});

Route::get('/', 'PostController@index');

Route::post('post/store', array('as' => 'post.store', 'uses' => 'PostController@store'));

Route::post('user/store', array('as' => 'user.store', 'uses' => 'UserController@store'));

Route::post('user/update', array('as' => 'user.update', 'uses' => 'UserController@update'));

Route::get('documentation', function(){
  
  return View::make('social.documentation');
  
});

Route::get('home', 'PostController@index');

Route::get('friends', 'FriendController@getindex');

Route::get('login', function(){
  
  if(Auth::check()){
      return Redirect::route('post.index');
	 }
	else{
	    
	    return View::make('user.login');
    }
  
});

Route::get('logout',function(){
    
    if(Auth::check()){
        return Redirect::route('user.logout');
    }
    else{
        return Redirect::route('post.index');
    }
});

Route::get('update', 'UserController@edit');

Route::resource('post', 'PostController');

Route::resource('comment', 'CommentController');

Route::resource('user', 'UserController');

Route::controller('friend', 'FriendController');




























