<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() //load the page for the user to create a user
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() //store the new user in the database if the validator passes
	{
		
    		$input = Input::all();
			$v = Validator::make($input, User::$rules);
			
			if($v->passes()){
				$password = $input['password'];
 				$encrypted = Hash::make($password);
				$user = new User;
 				$user->email = $input['email'];
				$user->password = $encrypted;
				$user->fullname =$input['fullname'];
				$user->dob = $input['dob'];
				$now = new DateTime();
				$birth = new DateTime($user->dob);
				$interval = $now->diff($birth);
				$age = $interval->y;
				$user->age = $age;
				$image = $input['image'];
    			$user->image = $image;
 				$user->save();
 				return Redirect::route('post.index');
			}
			else{
				return Redirect::route('user.create')->withErrors($v);
			}
 				
		}
 		
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile() //show the auth::user's profile page
	{
		if(Auth::check()){
        	$id = Auth::id();
			$user = User::find($id);
			$posts = Post::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();
			return View::make('user.profile')->withUser($user)->withPosts($posts);
    	}
    	else{
        return Redirect::route('post.index');
    	}
	
	}
	
	public function show($id) //show the details of the user that has been searched for
	{
			$user = User::find($id);
			$posts = Post::where('user_id', '=', $id)->orderBy('created_at', 'desc')->get();
			
			if(Auth::check()){
				
				if (Auth::user()->friends->count()) { //get all the keys of the auth::user's friends
					
					$friendlist = array();
					
					foreach(Auth::user()->friends as $friend){
						$friendlist[] = $friend->id;
					}
					
					if(in_array($id, $friendlist)){
						Session::put('friend_status','True');
					}
					else{
					}
					return View::make('user.show')->withUser($user)->withPosts($posts);
				}
					
				else{
					return View::make('user.show')->withUser($user)->withPosts($posts);
				}
			}
			else{
				return View::make('user.show')->withUser($user)->withPosts($posts);
			}
			
	}		
	public function search() //search the database for a user by their name
	{
		$input = Input::all();
		$fullname = $input['fullname'];
		$users = User::where('fullname', 'LIKE', '%'.$fullname.'%')->get();
		
		if($users){
			Session::put('search_status', '');
			return View::make('user.results')->withUsers($users);
		}
		else{
			Session::put('search_status', 'Search failed, try again?');
			return Redirect::back();
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit() //load the page for a user to edit their details
	{
		if(Auth::check()){
			$id = Auth::id();
			$user = User::find($id);
			return View::make('user.edit')->withUser($user);
		}
		else{
			return Redirect::route('post.index');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update() //update the user's details if the validator passes
	{
		
    	$input = Input::all();
    	$rules = array(
    		'email' => '|email|unique:users',
        	'password' => 'alpha_num',
        	'fullname' => 'alpha_spaces'
        	);
    			
			$v = Validator::make($input, $rules);
			if($v->passes()){
				
				$id = $input['id'];
				$user = User::find($id);
				
				if($input['password']){
					$password = $input['password'];
 					$encrypted = Hash::make($password);
 					$user->password = $encrypted;
 					$user->save();
				}
				if($input['email']){
				   $user->email = $input['email'];
				   $user->save();
				}
 				
				if($input['fullname']){
					$user->fullname =$input['fullname'];
					$user->save();
					
				}
				if($input['image']){
					$image = $input['image'];
    				$user->image = $image;
 					$user->save();
				}
				
 				return Redirect::route('post.index');
			}
			else{
				return Redirect::route('user.edit')->withErrors($v);
			}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	

	
	public function login(){ //let the user login
		$userdata = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
			);
			
			if(Auth::attempt($userdata)){
				return Redirect::route('post.index');
			} else{
				Session::put('log_status', 'Login failed, try again?');
				return Redirect::to(URL::previous());
			}
	}
	
	public function logout(){ //let the user logout
		Auth::logout();
		Session::put('log_status', 'You have logged out');
		return Redirect::route('post.index');
	}


}
