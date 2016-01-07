@extends('layouts.master')
{{ HTML::style('css/social.css') }}


@section('content')
<img class = "profile" src="{{ asset($user->image->url('medium')) }}">
</br>
{{{$user->fullname}}}</br> {{{$user->email}}}</br>  {{{$user->age}}} Years old

@if(Auth::check())
    @if (Session::has('friend_status'))  
        {{ link_to_action('FriendController@getRemoveFriend', 'Remove friend', array('id' => $user->id)) }}
    
    @elseif($user->id == Auth::user()->id)
    
    @else
        {{ link_to_action('FriendController@getAddFriend', 'Add friend', array('id' => $user->id)) }}
    
    @endif
    
@endif
{{{ Session::forget('friend_status') }}}
</br>
</br>

<h3> {{{$user->fullname}}}'s Posts</h3>

@foreach($posts as $post)
       
       
       <table>
       
        <tr>
          <td> <h3> {{User::Find($post->user_id)->fullname}} </h3></td>
           <td><h4>{{{$post->title}}} </h4><td>
         </tr>
         <tr>
           <td> <img src="{{ asset(User::Find($post->user_id)->image->url('thumb')) }}"> </td>
            <td>{{{$post->message}}}</td>
         </tr>
         <tr>
             <td colspan = "2">@if($post->totalcomments) {{ link_to_route('post.show', 'Comments', array($post->id)) }} {{{$post->totalcomments}}}
            @else
            {{ link_to_route('post.show', 'Comments', array($post->id)) }}
        @endif 
         
         
             </br>
                 @if(Auth::check())
             @if(Auth::user()->id == $post->user_id)
              {{ link_to_route('post.edit', 'Edit Post', array ($post->id)) }} 
             {{ Form::open
                 (array('method' => 'DELETE', 'route' => array('post.destroy', $post->id))) }}
                 {{ Form::submit('Delete Post', array('class' => 'btn btn-danger')) }}
             {{ Form::close() }}
             @endif
         @endif 
             </td>
         </tr>
         </br>
       

    @endforeach
    </table>

@stop