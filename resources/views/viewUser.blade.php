@extends('app')

@section('content')
    <p>Avatar:
        @if($user->avatar != null)
            <img src="{{ Croppa::url(asset('/avatars/' . $user->avatar), 100, 100) }}">
        @else
            <img src="{{ Croppa::url(asset('/avatars/default.png'), 100, 100) }}">
        @endif<br>
        Name: {{$user->name}}<br>Email: {{ HTML::email($user->email) }}<br>
        @if($editUser)
            <a href="{{url('/edit-user/' . $user->id)}}">Edit</a><br>
            <a href="{{url('delete-user/' . $user->id)}}">Delete</a></p>
        @endif
@endsection