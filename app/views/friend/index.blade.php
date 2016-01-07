@extends('layouts.master')
{{ HTML::style('css/social.css') }}


@section('content')


<h1>Friends</h1>
 You have {{ Auth::user()->friends->count() }} friends
 </br>
 </br>
 @foreach (Auth::user()->friends as $friend)
      <th> <img src="{{ asset($friend->image->url('thumb')) }}"> </th>
      <tr>
          <td>{{ link_to_route('user.show', $friend->getFullName(),array($friend->id)) }}</td>
          <td>{{ link_to_action('FriendController@getRemoveFriend', 'Remove friend', array('id' => $friend->id)) }}</td>
      </tr>
      @endforeach

@stop