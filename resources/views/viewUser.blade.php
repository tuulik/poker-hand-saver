@extends('app')

@section('content')
    <p>Avatar:
        @if($user->avatar != null)
            <img src="{{ Croppa::url('/avatars/' . $user->avatar, 100, 100) }}">
        @else
            <img src="{{ Croppa::url('/avatars/default.png', 100, 100) }}">
        @endif<br>
        Name: {{$user->name}}<br>Email: {{ HTML::email($user->email) }}<br>
        <a href="{{url('/edit-user/' . $user->id)}}">Edit</a><br>
        <a href="{{url('delete-user/' . $user->id)}}">Delete</a></p>
@endsection