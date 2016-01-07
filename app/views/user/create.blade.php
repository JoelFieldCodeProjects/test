@extends('layouts.master')
{{ HTML::style('css/social.css') }}

    @section('content')
        
        
            <h1>Create a new account</h1>
         {{ Form::open(array('url' => secure_url('user/store'),'method' => 'POST', 'files' => true)) }}
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
            {{ Form::label('dob', 'Date of Birth: ') }}
            {{ Form::text('dob') }}
            </br>
            E.g 10 September 1995
            {{$errors->first('dob') }}
            <p></p>
            {{ Form::label('image', 'Image:') }}
            {{ Form::file('image') }}
            
            </br>
            {{Form::submit('Create User') }}
        
        {{Form::close() }}
        
        </br>

        
    @stop