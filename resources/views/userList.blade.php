@extends('app')

@section('content')
    <h1>All Users</h1>
    <p>
    @foreach($users as $user)
        Name: {{$user->name}} Email: {{$user->email}} <br>
    @endforeach
@endsection