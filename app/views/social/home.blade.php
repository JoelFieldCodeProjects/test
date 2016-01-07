@extends('layouts.master')
{{ HTML::style('css/social.css') }}


@section('friends')
@if(Auth::check())
  <h1>Friends</h1>
   You have {{ Auth::user()->friends->count() }} friends
   </br>
   </br>
  @foreach (Auth::user()->friends as $friend)
      <img src="{{ asset($friend->image->url('thumb')) }}">
       <tr>
          <td> {{link_to_route('user.show', $friend->getFullName(),array($friend->id)) }}</td>
       </tr>
       @endforeach
@endif
@stop
@section('posting')

 
 
 @if(Auth::check())
 <h2>Post a status </h2>
  {{ Form::open(array('url' => secure_url('post/store'))) }}
            
            {{ Form::label('title', 'Title: ') }}
            {{ Form::text('title') }}
            {{$errors->first('title') }}
            <p></p>  
            {{ Form::label('message', 'Message: ') }}
            {{ Form::text('message') }}
            {{$errors->first('message') }}
            <p></p>
            Public
            {{Form::radio('type', 'Public') }}
            </br>
            Friends
            {{Form::radio('type', 'Friends') }}
            </br>
            Private
            {{Form::radio('type', 'Private') }}
            </br>
            {{ Form::hidden('id', $user->id) }}  
            {{Form::submit(' Create Post') }}
        
        {{Form::close() }}
     @else
     
     @endif
    
              
@stop
@section('content')


@if($posts)
    <p class = "heading"> NewsFeed</p>
     @if ( Auth::check())
                        <p>Welcome,</p><h3> {{ Auth::user()->fullname }}! </h3>
                       
      
                @else
                You aren't logged in, {{ link_to('login', 'Log in?') }}
                   
                @endif
    <br>
    @else
    <h1> There are no posts at the moment!</h1>
    @endif

    @foreach($posts as $post)
       
       
       <table>
       
         <td>
         {{ link_to_route('user.show', User::Find($post->user_id)->fullname, array($post->user_id)) }}
         
        </td>
        <td>
         <h4> {{{$post->title}}} </h4>
        </td>
        <tr>
          <td><img src="{{ asset(User::Find($post->user_id)->image->url('thumb')) }}"></td>
           <td>{{{$post->message}}}<td>
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
              </br>
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

