@extends('layouts.master')
{{ HTML::style('css/social.css') }}

@section('content')

    <h1>Search Results</h1>
    @foreach($users as $user)
    </br>
    <img src="{{ asset($user->image->url('thumb')) }}">
    </br>
    </br>
    {{ link_to_route('user.show', $user->fullname, array($user->id)) }} 
    @endforeach


@stop