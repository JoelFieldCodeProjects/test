<?php
    class Comment extends Eloquent
{
    function post()
    {
        return $this->belongsTo('Post');
    }
    function user(){
        return $this->belongsTo('User');
    }
    
    public static $rules = array(
        'message' => 'required'
        );
     protected $touches = array('post');
}
    
    
?>