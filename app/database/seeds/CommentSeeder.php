<?php
class CommentSeeder extends Seeder{
    public function run(){
        
        $comment = new Comment;
        $comment->name = "Shaun";
        $comment->message = "Hey";
        $comment->post_id = 1;
        $comment->save();
        
        $comment = new Comment;
        $comment->name = "Shaun";
        $comment->message = "Hey";
        $comment->post_id = 1;
        $comment->save();
        
        $comment = new Comment;
        $comment->name = "Shaun";
        $comment->message = "Hey";
        $comment->post_id = 3;
        $comment->save();
        
       
        
        
        
  }
}