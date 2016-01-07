<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Eloquent implements UserInterface, RemindableInterface, StaplerableInterface {

	use UserTrait, RemindableTrait, EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	 public function comments()
    {
        return $this->hasMany('Comment');
    }
    
     public function posts()
    {
        return $this->hasMany('Post');
    }
     
    public function getFullName() //return the user's name
    {
        return $this->fullname;
    }
    public function getId()
    {
        return $this->id;
    }
     
     public function friends()
    {
        return $this->belongsToMany('User', 'friends_users', 'user_id', 'friend_id');
    }
      public function addFriend($user)
    {
        $this->friends()->attach($user->id);
    }
 
    public function removeFriend($user)
    {
        $this->friends()->detach($user->id);
    }
   
    
    public static $rules = array(
        'email' => 'required|email|unique:users',
        'password' => 'required|alpha_num',
        'fullname' => 'required|alpha_spaces',
        'dob' => 'required|date'
        );
        
        public function __construct(array $attributes = array()) {
            $this->hasAttachedFile('image', [
                'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
                ]
            ]);
            parent::__construct($attributes);
        }


}
