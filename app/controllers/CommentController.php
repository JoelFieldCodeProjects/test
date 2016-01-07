<?php

class CommentController extends \BaseController {

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
	public function create()
	{
		
	}
		
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() //store the new comment if the validator passes
	{
			$input = Input::all();
			
			$v = Validator::make($input, Comment::$rules);
			if($v->passes()){
			
				$id = $input['id']; 
				$post = Post::find($id);
				$post->totalcomments = $post->totalcomments + 1; 
				$post->save();
				$comment = new Comment;
				$userid = Auth::id();
				$user = User::find($userid);
				$comment->user_id = $userid;
				$comment->name = $user->fullname;
				$comment->message = $input['message'];
				$comment->post_id = $id;
				$comment->save();
				
				return Redirect::route('post.show', $id);
			}
			else{
				return Redirect::back()->withErrors($v);
			}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	public function destroy() //delete the comment that was clicked
	{
		$input = Input::all();
		$id = $input['id'];
		$postid = $input['postid'];
		Comment::find($id)->delete();
		$post = Post::find($postid);
		$post->totalcomments = $post->totalcomments - 1; 
		$post->save();
        return Redirect::to(URL::previous());
	}
}
