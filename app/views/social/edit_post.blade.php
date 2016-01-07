@extends('layouts.master')
{{ HTML::style('css/social.css') }}
@section('title')
Edit Post
@stop

@section('content')
  {{ Form::model($post, array('method' => 'PUT',
        'route' => array('post.update', $post->id))) }}
            
            {{ Form::label('name' ) }}
            {{ Form::text('name') }}
            <p></p>        
            {{ Form::label('message', 'Message: ') }}
            {{ Form::text('message') }}
            {{$errors->first('message') }}
            <p></p>
            {{ Form::label('title', 'Title: ') }}
            {{ Form::text('title') }}
            {{$errors->first('title') }}
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
            {{Form::submit('Update Post') }}
        
        {{Form::close() }}
        
@stop