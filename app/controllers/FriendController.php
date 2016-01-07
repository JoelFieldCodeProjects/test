<?php
 
class FriendController extends \BaseController {
 
  	public function getIndex() //load the page which list's all the auth::user's friend's
  	{
    	
    	if(Auth::check()){
    		return View::make('friend.index');
    	}
    	else{
    		return Redirect::route('post.index');
    	}
 		
  	}
  
  	public function getAddFriend($id) //add another user as a friend
  	{
  		$user = User::find($id);
  		Auth::user()->addFriend($user);
  		return Redirect::back();
	}
	
	public function getRemoveFriend($id) // remove a user as a friend
	{
  		$user = User::find($id);
  		Auth::user()->removeFriend($user);
  		return Redirect::back();
	}

}