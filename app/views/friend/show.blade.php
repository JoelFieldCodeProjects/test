@extends('layouts.master')
{{ HTML::style('css/social.css') }}


@section('content')


<h1>Friends</h1>
 user()->friends->count() }} friends
 </br>
 </br>
 @foreach user()->friends as $friend)
      <img src="{{ asset($friend->image->url('thumb')) }}">