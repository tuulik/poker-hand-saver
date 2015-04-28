@extends('app')

@section('content')
    <p>Avatar: {!! HTML::image(asset('/avatars/' . $user->avatar)) !!}<br>
        Name: {{$user->name}}<br>Email: {{ HTML::email($user->email) }}<br>
        <a href="{{url('/edit-user/' . $user->id)}}">Edit</a><br>
        <a href="{{url('delete-user/' . $user->id)}}">Delete</a></p>
@endsection