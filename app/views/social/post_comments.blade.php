@extends('layouts.master')
{{ HTML::style('css/social.css') }}


@section('posting')
  @if(Auth::check())
  <h2>Post a comment</h2>
    {{ Form::open(array('action' => 'CommentController@store')) }}
            
          
            <p></p>        
            {{ Form::label('message', 'Message: ') }}
            {{ Form::text('message') }}
            {{$errors->first('message') }}
            {{ Form::hidden('id', $post->id) }}  
            <p></p>
            {{Form::submit(' Create Comment') }}
        {{Form::close() }}
     @endif   
@stop

@section('content')


 <table>
        
        <tr>
          <td>{{ link_to_route('user.show', User::Find($post->user_id)->fullname, array($post->user_id)) }}</td>
           <td>{{{$post->message}}}<td>
         </tr>
         <tr>
           <td> <img src="{{ asset(User::Find($post->user_id)->image->url('thumb')) }}"> </td>
            <td>{{{$post->title}}}</td>
         </tr>
  </table>
   
   
   @if($comments)
  <p class = "heading">Comments</p>
  
  @foreach($comments as $comment)
   <table class = "commentstable">
        <tr>
          <td>{{ link_to_route('user.show', User::Find($comment->user_id)->fullname, array($comment->user_id)) }}</td>
         </tr>
         <tr>
           <td> <img src="{{ asset(User::Find($comment->user_id)->image->url('thumb')) }}"> </td>
           <td>{{{$comment->message}}}<td>
         </tr>
         <tr>
          <td>
           @if(Auth::check())
          @if(Auth::user()->id == $comment->user_id)
            {{ Form::open
              (array('method' => 'DELETE', 'route' => 'comment.destroy')) }}
              {{ Form::hidden('id', $comment->id) }}  
              {{ Form::hidden('postid', $comment->post_id) }}  
              {{ Form::submit('Delete Comment', array('class' => 'btn btn-danger')) }}
           {{ Form::close() }}
         @endif
      @endif   
          </td>
         </tr>
  </table>
    
  @endforeach
  
  
  @else
  <p class ="heading">No Comments</p>
  @endif

  
@stop

    
