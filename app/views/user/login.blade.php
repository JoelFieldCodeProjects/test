@extends('layouts.master')
{{ HTML::style('css/social.css') }}

@section('content')
<h1>Login?</h1>
                      {{ Form::open(array('url' => secure_url('user/login'))) }}
                          {{ Form::label('email', 'Email: ') }}
                          {{ Form::text('email') }}
                          {{$errors->first('email') }}
                          <p></p>        
                          {{ Form::label('password', 'Password: ') }}
                          {{ Form::text('password') }}
                          <p></p>
             
                          {{Form::submit('Sign In') }}
                          </br>
                          </br>
                          {{ link_to_route('user.create', 'Create a User') }}
                          </br>
                         
        
                      {{Form::close() }}
@stop