@extends('app')

@section('content')
    @foreach($hands as $hand)
        <p>User: {{$hand->user->name }} Hand: {{$hand->hand}} Description: {{$hand->description}}</p>
    @endforeach
@endsection