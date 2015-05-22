@extends('app')

@section('content')
    @foreach($hands as $hand)
        <p>User: {{$hand->user->name }} {{ $hand->user->avatar }} <br>Hand: {{$hand->hand}} Description: {!!$hand->description!!}<br>
        <a href="{{'pokerhand/' . $hand->id}}">View hand</a> </p>
    @endforeach
@endsection