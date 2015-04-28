@extends('app')

@section('content')
    <p>Name: {{$user->name}}<br>Email: {{$user->email}}<br><a href="{{url('/edit-user/' . $user->id)}}">Edit</a><br><a href="{{url('delete-user/' . $user->id)}}">Delete</a></p>
@endsection