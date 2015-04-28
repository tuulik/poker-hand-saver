@extends('app')

@section('content')
    <h1>All Users</h1>
    <p>
    @foreach($users as $user)
        Name: {{$user->name}} <a href="view-user/{{$user->id}}">View user profile</a><br>
    @endforeach
    </p>
@endsection