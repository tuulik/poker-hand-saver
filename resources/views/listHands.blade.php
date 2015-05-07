@extends('app')

@section('content')
    @foreach($hands as $hand)
        <p>User: {{$hand->user->name }} {{ $hand->user->avatar }} <br>Hand: {{$hand->hand}} Description: {{$hand->description}}</p>
    @endforeach
@endsection