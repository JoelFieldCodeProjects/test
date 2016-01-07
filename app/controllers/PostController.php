<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() // Load the home page, if user is logged in pass all posts and the Auth::user into the posts page
	{
		if (Auth::check()){
			$id = Auth::id();
			$user = User::find($id);
			$posts = Post::where('id', '>', '0')->orderBy('created_at', 'desc')->get();
			return View::make('social.home')->with('posts', $posts)->withUser($user);
			}
		else{
			$posts = Post::where('type', 'LIKE', 'public' )->get(); //if user isnt logged in then they can only see public posts.
			return View::make('social.home')->withPosts($posts);
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
    	
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() //store a new post in the database provided the validator passes
	{
			
			$input = Input::all();
    	
    		$v = Validator::make($input, Post::$rules);
			if($v->passes()){
				$post = new Post;
				$post->message = $input['message'];
				$post->title = $input['title'];
				$id = $input['id'];
				$user = User::find($id);
				$post->user_id = $id;
				$post->name = $user->fullname;
				$type = $input['type'];
				$post->type = $type;
				$post->save();
				return Redirect::route('post.index')->withUser($user);
			}
			else{
				return Redirect::route('post.index')->withErrors($v); 
			}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) //show the comments for the post that was clicked
	{
		
		$post = Post::find($id);
		$comments = Post::find($id)->comments; 
		return View::make('social.post_comments')->with('post', $post)->with('comments', $comments);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) //load the page for the user to update their post
	{
		$post = Post::find($id);
		return View::make('social.edit_post')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) //update the post if the validator passes
	{
		
		$post = Post::find($id);
		
		$input = Input::all();
		
		$v = Validator::make($input, Post::$rules);
		if($v->passes()){
			
			$post->message = $input['message'];
			$post->title = $input['title'];
			$type = $input['type'];
			$post->type = $type;
			$post->save();
		
			return Redirect::route('post.show', $post->id);
		}
		else{
			return Redirect::route('post.edit', $post->id)->withErrors($v); 
			}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) //delete the post that was clicked
	{
		Post::find($id)->delete();
        return Redirect::route('post.index');
	}
}