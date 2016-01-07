@extends('layouts.master')
{{ HTML::style('css/social.css') }}

@section('content')
<h1>Edit Account</h1>
        {{ Form::open(array('url' => secure_url('user/update'),'method' => 'POST', 'files' => true)) }}
            
            {{ Form::label('email', 'Email: ') }}
            {{ Form::text('email') }}
            {{$errors->first('email') }}
            <p></p>        
            {{ Form::label('password', 'Password: ') }}
            {{ Form::text('password') }}
            {{$errors->first('password') }}
            <p></p>
            {{ Form::label('fullname', 'Full Name: ') }}
            {{ Form::text('fullname') }}
            {{$errors->first('fullname') }}
            <p></p>
            {{ Form::label('image', 'Image:') }}
            {{ Form::file('image') }}
            {{ Form::hidden('id', $user->id) }} 
            
            </br>
            {{Form::submit('Update Account') }}
        
        {{Form::close() }}
        
        </br>
@stop