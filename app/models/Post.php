<?php
    class Post extends Eloquent
{
    function comments()
    {
        return $this->hasMany('Comment');
    }
    function user(){
        return $this->belongsTo('User');
    }
    
    public static $rules = array(
        'message' => 'required',
        'title' => 'required',
        'type' => 'required'
        );
}
    
    
?>